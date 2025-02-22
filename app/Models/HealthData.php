<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    protected $table = 'health_data'; // Especifique o nome da tabela
    
    protected $fillable = [
        'user_id',
        'weight',
        'height',
        'age',
        'gender',
        'sistolica',
        'diastolica',
        'tabagismo',
        'alcoolismo',
        'alimentacao_nao_saudavel',
        'estresse_cronico',
        'drogas_ilicitas',
        'insonia',
        'activity_level'
    ];
    
    protected $casts = [
        'tabagismo' => 'boolean',
        'alcoolismo' => 'boolean',
        'alimentacao_nao_saudavel' => 'boolean',
        'estresse_cronico' => 'boolean',
        'drogas_ilicitas' => 'boolean',
        'insonia' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}