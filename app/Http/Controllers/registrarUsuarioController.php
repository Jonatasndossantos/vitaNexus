<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrarUsuarioController extends Controller
{
    public function index(){
        $dados = modelUsuario::all(); //tras todos os dados da tabela
        return view('paginas.cadastrar')->With('dados',$dados);
    }//fim do método -retornar dados

    public function store(request $request){
        $email = $request->input('email');
        $senha = $request->input('senha');

        //Inserindo os dados da tabela
        $model = new modelUsuario();
        $model->email = $email;
        $model->senha = $senha;

        $model->save();//armazena
        return redirect('/dashboard');
    }//fim metodo requisicao de cadastro
}
