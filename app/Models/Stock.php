<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fornecedor_id',
        'medicamento_id',
        'composicao_unit',
        'comprimidos_por_cartela',
        'numero_de_cartelas',
        'preco_por_cartela',
        'validade',
        
    ];

     // Relação com o modelo Fornecedor
     public function fornecedor()
     {
         return $this->belongsTo(Fornecedore::class);
     }
 
     // Relação com o modelo Medicamento
     public function medicamento()
     {
         return $this->belongsTo(Medicamento::class);
     }
}
