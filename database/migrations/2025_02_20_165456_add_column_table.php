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
        Schema::table('stock_produtos', function (Blueprint $table) {
            // Verifica se as colunas 'fornecedor_id' e 'medicamento_id' já existem
            if (!Schema::hasColumn('stock_produtos', 'fornecedor_id')) {
                $table->unsignedBigInteger('fornecedor_id');
            }
            if (!Schema::hasColumn('stock_produtos', 'medicamento_id')) {
                $table->unsignedBigInteger('medicamento_id');
            }

            // Adicionando as chaves estrangeiras
            $table->foreign('fornecedor_id')
                  ->references('id')
                  ->on('fornecedores')
                  ->onDelete('cascade');

            $table->foreign('medicamento_id')
                  ->references('id')
                  ->on('medicamentos')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('stock_produtos', function (Blueprint $table) {
            // Removendo as chaves estrangeiras
            $table->dropForeign(['fornecedor_id']);
            $table->dropForeign(['medicamento_id']);
        });
    }
};
