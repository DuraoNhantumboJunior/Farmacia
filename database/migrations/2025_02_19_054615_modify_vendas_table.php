<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            // Adicionar a coluna produtos do tipo JSON, caso ainda não exista
            if (!Schema::hasColumn('vendas', 'produtos')) {
                $table->json('produtos')->after('user_id')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            // Remover a coluna JSON de produtos caso ela exista
            if (Schema::hasColumn('vendas', 'produtos')) {
                $table->dropColumn('produtos');
            }
        });
    }
};
