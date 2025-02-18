<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrarSaudeController extends Controller
{
    public function dashboard(){
        $dados = modelSaude::all(); //tras todos os dados da tabela
        return view('dashboard')->With('dados',$dados);

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
}
