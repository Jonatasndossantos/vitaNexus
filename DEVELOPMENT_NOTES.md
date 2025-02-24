# Guia de Desenvolvimento - Saúde em Foco

## 1. Estrutura do Projeto

### 1.1 Configuração Inicial
```bash
# Criar novo projeto Laravel
laravel new saude-em-foco
#ou
composer create-project laravel/laravel saude-em-foco


# Instalar Breeze para autenticação
composer require laravel/breeze --dev
php artisan breeze:install
```
#### 1.1.1 Configuração do Banco de Dados
ops: o breeze cria automaticamente uma tabela para o usuario fazer login e etc.

### 1.2 Banco de Dados
Criamos uma tabela principal para os dados de saúde:
```bash
php artisan make:migrate create_health_data_table
```

```php
// sim eu segui o mesmo padrao das outras por isso o create e o ingles
// database/migrations/[timestamp]_create_health_data_table.php
public function up()
{
    Schema::create('health_data', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();//Relacionando o id do usuario com a nova tabela
        $table->decimal('weight', 5, 2);
        $table->decimal('height', 5, 2);
        $table->integer('age');
        $table->enum('gender', ['male', 'female']);
        $table->integer('sistolica');
        $table->integer('diastolica');
        $table->boolean('tabagismo')->default(false); //false para poder ser nulo ou seja o contrario de notNull
        $table->boolean('alcoolismo')->default(false);
        $table->boolean('alimentacao_nao_saudavel')->default(false);
        $table->boolean('estresse_cronico')->default(false);
        $table->boolean('drogas_ilicitas')->default(false);
        $table->boolean('insonia')->default(false);
        $table->enum('activity_level', [
            'sedentary',
            'light',
            'moderate',
            'active',
            'extra_active'
        ]);
        $table->timestamps(); //Data atual
    });
}
```

## 2. Modelos e Relacionamentos
### 2.1 Model User
ops: ela ja vem com o breeze instalado só precisamos criar a tabela de saúde
```php
// app/Models/User.php
public function healthData()
{
    return $this->hasMany(HealthData::class); // N:1
}
```

A função healthData() define um relacionamento "um para muitos" (one-to-many) entre o modelo User e HealthData.
O hasMany significa que um usuário pode ter múltiplos registros de dados de saúde.

Por exemplo:
- Um usuário pode registrar seus dados de saúde várias vezes ao longo do tempo
- Cada registro é uma nova entrada na tabela health_data
- Todos os registros ficam vinculados ao ID do usuário através da chave estrangeira user_id

### 2.2 Model HealthData

```bash
php artisan make:model HealthData
```
```php
// app/Models/HealthData.php
class HealthData extends Model
{
    protected $fillable = [ //fillable define quais campos podem ser preenchidos em massa (mass assignment)
        'user_id',
        'weight',
        'height',
        // ... outros campos sao muitos ent nao vou repetir
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Pertence a usuario 1:N
    }
}
```

ops: nao esqueca de dar um migrate para realmente criar o banco de dados em sqlite
```bash
php artisan migration
```

## 3. Controllers e Lógica do Negócio
```bash
php artisan make:controller HealthDataController 
```

### 3.1 HealthDataController
- Principais métodos:
  - index(): Exibe dashboard com últimos dados
  - store(): Salva novos dados de saúde
  - history(): Mostra histórico de medições
  - calculateIMC(): Calcula IMC
  - calculateWaterIntake(): Calcula necessidade de água
  - calculateCalories(): Calcula necessidades calóricas
  - os outros sao para ajudar nesses principais

### 3.2 Cálculos Importantes
```php
// Cálculo do IMC
private function calculateIMC($weight, $height)
{
    $heightInMeters = $height / 100;
    return $weight / ($heightInMeters * $heightInMeters);
}

// Cálculo de calorias (Harris-Benedict)
private function calculateCalories($data)
{
    $bmr = ($data['gender'] === 'male')
        ? 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age)
        : 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    
    return $bmr * $activityMultipliers[$data['activity_level']];
}

'protein' => [
    'min' => round($calories * 0.25 / 4),
    'max' => round($calories * 0.35 / 4)
],
'carbs' => [
    'min' => round($calories * 0.45 / 4),
    'max' => round($calories * 0.65 / 4)
],
'fats' => [
    'min' => round($calories * 0.20 / 9),
    'max' => round($calories * 0.35 / 9)
]
```

## 4. Views e Frontend

ops: isso ficou com a nicole, dem parabens para ela.

### 4.1 Estrutura das Views
```
resources/views/
├── layouts/
│   └── app.blade.php
├── home.blade.php
└── history.blade.php
```

### 4.2 Componentes Bootstrap Principais
- Cards para exibição de métricas
- Modais para informações detalhadas
- Formulários responsivos
- Tabelas para histórico

## 5. Rotas
```php
// routes/web.php
// auth para verificaçoes de dados automaticamento feitos pelo breeze sla se funciona mas as rotas continuam as mesmas
Route::middleware('auth')->group(function () {
    Route::get('/home', [HealthDataController::class, 'index'])->name('home');
    Route::post('/health/store', [HealthDataController::class, 'store'])->name('health.store');
    Route::get('/history', [HealthDataController::class, 'history'])->name('history');
});
```

## 6. Validação de Dados
```php
// Regras de validação
$validator = Validator::make($request->all(), [
    'weight' => 'required|numeric|min:30|max:300', // validacao para notnull, numerio e valor entre 30 e 300. ops: nao precisava disso
    'height' => 'required|numeric|min:100|max:250',
    'age' => 'required|numeric|min:1|max:120',
    // ... outras regras
]);
```

## 7. Dicas de Desenvolvimento
1. Use migrations para todas as alterações no banco
2. Mantenha os cálculos de saúde em métodos separados
3. Valide todos os inputs do usuário
4. Use componentes Blade para código reutilizável
5. Mantenha o controller limpo, mova lógica complexa para Services
6. Use constants para valores frequentemente usados

## 8. Próximos Passos
- [ ] Implementar gráficos de progresso
- [ ] Adicionar recomendações personalizadas
- [ ] Criar API para possível app mobile
- [ ] Implementar exportação de dados
- [ ] Adicionar notificações e lembretes 