<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'designacao',
        'unidade_medida',
    ];

    // Relação com o modelo Stock
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
