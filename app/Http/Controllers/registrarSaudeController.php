<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrarSaudeController extends Controller
{
    public function index(){
        $dados = modelSaude::all(); //tras todos os dados da tabela
        return view('cadastrar')->With('dados',$dados);
    }//fim do método -retornar dados


    public function store(request $request){
        $peso   = $request->input('peso  ');
        $altura = $request->input('altura');
        $idade  = $request->input('idade ');
        $genero = $request->input('genero');
        $nivel  = $request->input('nivel ');
        

        //Inserindo os dados da tabela
        $model = new modelSaude();

        $model->peso = $peso;
        $model->altura = $altura;
        $model->idade = $idade;
        $model->genero = $genero;
        $model->nivel = $nivel;

        $model->save();//armazena
        return redirect('/');
    }//fim metodo requisicao de cadastro
}
