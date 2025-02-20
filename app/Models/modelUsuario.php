<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class modelUsuario extends Model
{
    use HasFactory;//Fatoração - Dividir
    protected $table = 'usuario'; //nome da tabela
}
