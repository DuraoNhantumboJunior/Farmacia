<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'produtos',
        'pagamento',
        'total',
        'data_venda',
    ];

    protected $casts = [
        'produtos' => 'array', // Converte JSON automaticamente em array ao recuperar
        'quantidade' => 'array',
    ];
}
