<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_Produto extends Model
{
    use HasFactory;

    protected $table = 'stock_produtos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'fornecedor_id',
        'medicamento_id',
        'composicao_unit',
        'quantidade',
        'preco',
        'validade',
    ];
}
