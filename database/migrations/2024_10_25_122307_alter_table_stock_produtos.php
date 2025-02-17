<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stock_produtos', function (Blueprint $table) {
            $table->dropColumn('produto_id');
            $table->integer('medicamento_id')->constrained('medicamentos')->onDelete('cascade')->after('fornecedor_id');
            $table->integer('composicao_unit')->after('medicamento_id');
        });

        Schema::table('medicamentos',function(Blueprint $table){
            $table->renameColumn('Apresentacao','designacao');
            $table->renameColumn('Nome','nome');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_produtos', function (Blueprint $table) {
            $table->dropColumn('medicamento_id');
            $table->integer('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->dropColumn('composicao_unit');
        });

        Schema::table('medicamentos',function(Blueprint $table){
            $table->renameColumn('designacao','Apresentacao');
            $table->renameColumn('nome','Nome');
        });
    }
};
