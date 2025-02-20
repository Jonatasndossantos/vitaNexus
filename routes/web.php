<?php

use Illuminate\Support\Facades\Route;
use App\http\Controler\registrarAtividadeControler;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/login',function(){
    return view('paginas.login');
});

Route::get('/cadastrar', function () {
    return view('paginas.cadastrar');
});

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

route::get('/cadastrar/salvar',[App\http\controllers\registrarUsuarioControler::class, 'store']);