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
       
        // Tabela de estoque de medicamentos
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fornecedor_id')->constrained('fornecedor')->onDelete('cascade'); // cada medicamento referência um fornecedor
            $table->foreignId('medicamento_id')->constrained('medicamento')->onDelete('cascade'); // cada stock referencia um medicamento
            $table->integer('composicao_unit'); // quando que cada composto possui na embalagem 
            $table->integer('quantidade'); // Quantidade disponível em estoque
            $table->decimal('preco', 8, 2); // Preço por unidade do medicamento
            $table->date('validade');
            $table->timestamps();
        });

          // Tabela de vendas
          Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('cliente'); // Referencia o  (cliente) que fez a compra
            $table->foreignId('stock_id')->constrained('stock'); //referencia o medicamento
            $table->decimal('total', 10, 2); // Total da venda
            $table->timestamp('data_venda')->useCurrent(); // Data da venda
            $table->timestamps();
        });

        // Tabela de produtos vendidos (medicamentos vendidos)
        Schema::create('produtos_vendidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('venda')->onDelete('cascade'); // Cada produto vendido referencia uma venda
            $table->foreignId('stock_id')->constrained('stock')->onDelete('cascade'); // Referencia o medicamento no estoque
            $table->integer('quantidade'); // Quantidade do medicamento vendido
            $table->decimal('preco', 8, 2); // Preço do medicamento no momento da venda
            $table->decimal('subtotal', 10, 2); // Subtotal (preço * quantidade)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
        Schema::dropIfExists('venda');
        Schema::dropIfExists('produtos_vendidos');
    }
};
