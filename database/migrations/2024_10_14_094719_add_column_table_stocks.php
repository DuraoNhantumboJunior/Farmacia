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
        Schema::table('stocks', function (Blueprint $table) {
            $table->integer('numero_de_cartelas')->after('quantidade');
            $table->renameColumn('quantidade', 'comprimidos_por_cartela');
            $table->renameColumn('preco', 'preco_por_cartela');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('numero_de_cartelas');
            $table->renameColumn('comprimidos_por_cartela', 'quantidade');
            $table->renameColumn('preco_por_cartela', 'preco');
        });
    }
};
