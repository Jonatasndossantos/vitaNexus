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

---
## Historia
Usuario: Ao entrar quero colcoar meus dados normais para contato e facilitação de proximo acesso
usuario: quero poder navear pelo site e ver sua beleza, animação
usuario: Colocar meus dados e ver.

desenvolvedor: Quero promover um bom conforto em meu site
desenvolvedor: quero poder ser util dando funçoes sobre saude e bem estar.

# Cadastro e Login 
Criar pagina com form: example bootstrap   feito
Criar logica de cadastro e login: CRUD basico, esta nas anotaçoes da aula do laravel

### crud basico

### View
https://laravel.com/docs/11.x/views
<br>
<form method="GET" action"vinculado no web">
<br>

### migration

https://laravel.com/docs/11.x/migrations<br>

php artisan make:migrate nome do banco<br>

no arquivo criado crie a tabela e as colunas<br>

```php
Schema::create('* nome da tabela *', function (Blueprint $table) {
    $table->id(); //colunas
    $table->string('name');
    $table->string('email');
    $table->timestamps(); //data
});
``` 
<br>

*ops o de excluir tmb: ```Schema::dropIfExists('products');```
*<br>
```php artisan migrate``` 
<br>
Para realmente criar a tabela.<br>
verifique no sqlite. <br>
<br>

### controller
https://laravel.com/docs/11.x/authentication#authenticating-users<br>

php artisan make:controller nome do controlador<br>

o professor ensinou assim:<br>

```php

public function index(){
        $dados = modelAgenda::all(); //tras todos os dados da tabela
        return view('paginas.cadastrar')->With('dados',$dados);
    }//fim do método -retornar dados
    public function store(request $request){
        $data = $request->input('dataEvento');
        $descricao = $request->input('descricaoTexto');
        //Inserindo os dados da tabela
        $model = new modelAgenda();
        $model->dataEvento = $data;
        $model->descricao = $descricao;

        $model->save();//armazena
        return redirect('/cadastrar');
    }//fim metodo requisicao de cadastro

```

<br><br>
O laravel da inicio com isso:
<br>

```php

public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    } 

```
<br><br>

### model
<br>
php artisan make:model modelUsuario
<br>

```php
    use Illuminate\Database\Eloquent\Factories\HasFactory;
```
<br>
```php

    use HasFactory;//Fatoração - Dividir
    protected $table = 'usuario'; //nome da tabela

```

<br>

## Funcionalidades
<br>
Colocar os dados e salvar: CRUD basico
Fazer calculos e mostrar para o usuario: Logica ja foi feita com pesquisa, só precisa salvar
organizar para nao dar conflito: *ops parte mais dificil*

## Beleza do site
Cores css ou bootstrap: ja esta sendo feito pela nicole

---


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
