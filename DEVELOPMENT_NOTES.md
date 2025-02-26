# OPS esta area esta em desenvolvimento desconsidere maluquices

## Preparando o Ambiente
Ao clonar o repositorio certifique-se de estar na pasta correta.<br>
De um ```composer update and composer install```. <br>
*if error: ```git config --global --add safe.directory C:/xampp/htdocs```* <br><br>

Verifique o arquivo **.env** se nao estiver use o **.env.example** clone e renomeie para .env<br>
Precisamos cria uma chave para o app de um ```php artisan key:generate``` <br>

Lembrando que este codigo tambem usa o vite,<br> 
Coloque ```npm install ``` ```npm run build``` ```composer run dev```. <br>
coloque ```php artisan migrate```<br> 
*if error* ```php artisan config:clear ```<br><br> 
E pronto, de um ```php artisan serve```.


*Alem disso usamos o breeze ops: se der algum erro de* ```php artisan breeze:install ``` 


# Saúde em Foco - Sistema de Monitoramento de Saúde
---
## Historia
Usuario: Ao entrar quero colcoar meus dados normais para contato e facilitação de proximo acesso
usuario: quero poder navear pelo site e ver sua beleza, animação
usuario: Colocar meus dados e ver.

desenvolvedor: Quero promover um bom conforto em meu site
desenvolvedor: quero poder ser util dando funçoes sobre saude e bem estar.

## Cadastro e Login 
Criar pagina com form: example bootstrap
Criar logica de cadastro e login: CRUD basico, esta nas anotaçoes da aula do laravel

## Funcionalidades
Colocar os dados e salvar: CRUD basico
Fazer calculos e mostrar para o usuario: Logica ja foi feita com pesquisa, só precisa salvar
organizar para nao dar conflito: *ops parte mais dificil*

## Beleza do site
Cores css ou bootstrap: ja esta sendo feito pela nicole

182e7794-1d01-4270-bc60-a7dc6faf5a14

---
# Guia de Desenvolvimento - Saúde em Foco

## 1. Estrutura do Projeto

### 1.1 Configuração Inicial
```bash
# Criar novo projeto Laravel
laravel new saude-em-foco
#ou
composer create-project laravel/laravel saude-em-foco
composer create-project laravel/laravel:^11.* project_name
# version


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
- **index()**: Exibe o dashboard com os últimos dados de saúde do usuário.
  - **Interação**: Quando o usuário acessa a página inicial (`/home`), o método `index()` é chamado. Ele busca os dados de saúde mais recentes do usuário logado e os passa para a view `home.blade.php`.
  - **Botão "Novo Registro"**: Redireciona para a mesma página, mas com um formulário para adicionar novos dados de saúde. O botão é gerado na view com a rota `home` e um parâmetro `form=true`.

- **store()**: Salva novos dados de saúde no banco de dados.
  - **Interação**: Quando o usuário preenche o formulário e clica no botão "Salvar", o método `store()` é chamado. Ele valida os dados do formulário e, se tudo estiver correto, cria um novo registro na tabela `health_data`.
  - **Botão "Salvar"**: Envia os dados do formulário para a rota `health.store`, que chama o método `store()`.
  - **Cálculos**:
    - **calculateIMC()**: Após a validação, o IMC é calculado com base no peso e altura fornecidos.
    - **calculateWaterIntake()**: Calcula a necessidade diária de água com base no peso do usuário.
    - **calculateCalories()**: Calcula as necessidades calóricas diárias com base em fatores como idade, gênero, peso e nível de atividade.

### 3.2 Interações com a View

- **Botão "IMC"**: 
  - **Ação**: Ao clicar, abre um modal que explica o que é o IMC e como ele é calculado.
  - **Como Funciona**: O modal é ativado pelo atributo `data-bs-toggle="modal"` e `data-bs-target="#imcModal"`, que faz com que o Bootstrap exiba o modal correspondente. Não faz chamadas ao backend, apenas exibe informações.

- **Botão "Hidratação"**: 
  - **Ação**: Ao clicar, abre um modal que fornece informações sobre a importância da hidratação e recomendações gerais.
  - **Como Funciona**: Similar ao botão IMC, utiliza `data-bs-toggle` e `data-bs-target` para abrir o modal. Não faz chamadas ao backend.

- **Botão "Calorias"**: 
  - **Ação**: Ao clicar, abre um modal que explica como calcular as necessidades calóricas.
  - **Como Funciona**: Utiliza os mesmos atributos para abrir o modal. Sem interação com o backend.

- **Formulário de Registro de Saúde**: 
  - **Campos**: Peso, altura, idade, gênero, pressão arterial, nível de atividade, e vícios.
  - **Botão "Salvar"**: 
    - **Ação**: Envia os dados do formulário para o método `store()` do `HealthDataController`.
    - **Como Funciona**: O formulário é enviado via POST para a rota `health.store`. Se a validação falhar, os erros são exibidos na mesma página.
    - **Cálculos**:
      - **calculateIMC()**: 
        ```php
        private function calculateIMC($weight, $height)
        {
            $heightInMeters = $height / 100;
            return round($weight / ($heightInMeters * $heightInMeters), 2);
        }
        ```
      - **calculateWaterIntake()**: 
        ```php
        private function calculateWaterIntake($weight)
        {
            // Cálculo básico: 35ml por kg de peso corporal
            return $weight * 35;
        }
        ```
      - **calculateCalories()**: 
        ```php
        private function calculateCalories($data)
        {
            // Fórmula de Harris-Benedict revisada
            $bmr = 0; // Taxa Metabólica Basal

            if ($data['gender'] === 'male') {
                $bmr = 88.362 + (13.397 * $data['weight']) + (4.799 * $data['height']) - (5.677 * $data['age']);
            } else {
                $bmr = 447.593 + (9.247 * $data['weight']) + (3.098 * $data['height']) - (4.330 * $data['age']);
            }

            // Multiplicador baseado no nível de atividade
            $activityMultipliers = [
                'sedentary' => 1.2,      // Pouco ou nenhum exercício
                'light' => 1.375,        // Exercício leve 1-3 dias/semana
                'moderate' => 1.55,      // Exercício moderado 3-5 dias/semana
                'active' => 1.725,       // Exercício pesado 6-7 dias/semana
                'extra_active' => 1.9    // Exercício muito pesado, trabalho físico
            ];

            return $bmr * $activityMultipliers[$data['activity_level']];
        }
        ```

- **Exibição de Resultados**: Após o envio bem-sucedido do formulário, os dados mais recentes são exibidos na parte superior da página, mostrando IMC, consumo de água e necessidades calóricas.

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

## 7. Tradução
Primeiramente devemos
```bash
 php artisan lang:publish
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

