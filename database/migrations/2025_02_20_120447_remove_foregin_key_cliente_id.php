<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vendas',function(Blueprint $table){
            $table->dropForeign('venda_cliente_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendas',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('clientes');
        });
    }
};
