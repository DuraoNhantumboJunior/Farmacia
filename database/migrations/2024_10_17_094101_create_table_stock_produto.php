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
        Schema::create('stock_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('fornecedor_id')->constrained('fornecedores')->onDelete('cascade');;
            $table->integer('produto_id')->constrained('produtos')->onDelete('cascade');;
            $table->integer('quantidade');
            $table->decimal('preco','8','2');
            $table->date('validade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_produtos');
    }
};
