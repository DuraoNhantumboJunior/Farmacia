<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
    public function up()
    {
        // Renomear as tabelas
        Schema::rename('stock', 'stocks');
        Schema::rename('venda', 'vendas');
        Schema::rename('medicamento', 'medicamentos');
        Schema::rename('cliente', 'clientes');
        Schema::rename('fornecedor', 'fornecedores');
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Reverter as alterações se necessário
        Schema::rename('stoks', 'stock');
        Schema::rename('vendas', 'venda');
        Schema::rename('medicamentos', 'medicamento');
        Schema::rename('clientes', 'cliente');
        Schema::rename('fornecedores', 'fornecedor');
    }
};
