<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modelSaude extends Model
{
    use HasFactory;//Fatoração - Dividir
    protected $table = 'Saude'; //nome da tabela
}
