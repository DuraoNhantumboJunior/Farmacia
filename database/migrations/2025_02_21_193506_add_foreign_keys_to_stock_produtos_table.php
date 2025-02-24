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
            // Adding foreign key reference for 'fornecedor_id' to 'fornecedores' table
            $table->foreign('fornecedor_id')
                  ->references('id')
                  ->on('fornecedores')
                  ->onDelete('cascade'); // Ensures the related stock_produtos are deleted when fornecedor is deleted

            // Adding foreign key reference for 'medicamento_id' to 'medicamentos' table
            $table->foreign('medicamento_id')
                  ->references('id')
                  ->on('medicamentos')
                  ->onDelete('cascade'); // Ensures the related stock_produtos are deleted when medicamento is deleted
        });
    }
    /**
     * Reverse the migrations.
     */

    public function down()
    {
        Schema::table('stock_produtos', function (Blueprint $table) {
            // Drop the foreign keys if rolling back the migration
            $table->dropForeign(['fornecedor_id']);
            $table->dropForeign(['medicamento_id']);
        });
    }

};
