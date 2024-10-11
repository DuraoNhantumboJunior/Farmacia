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
        // Verifica se a tabela de medicamentos não existe antes de criá-la
        if (!Schema::hasTable('medicamento')) {
            Schema::create('medicamento', function (Blueprint $table) {
                $table->id(); // ID do medicamento
                $table->string('Nome', 25); // Nome do medicamento
                $table->string('Apresentacao'); // Apresentação do medicamento (ex: comprimido, xarope, injetável)
                $table->string('unidade_medida'); // Unidade de medida (ex: mg, g, ml)
            });
        }

        // Verifica se a tabela de clientes não existe antes de criá-la
        if (!Schema::hasTable('cliente')) {
            Schema::create('cliente', function (Blueprint $table) {
                $table->id(); // ID do cliente
                $table->string('Nome'); // Nome do cliente
            });
        }

        // Verifica se a tabela de fornecedores não existe antes de criá-la
        if (!Schema::hasTable('fornecedor')) {
            Schema::create('fornecedor', function (Blueprint $table) {
                $table->id(); // ID do fornecedor
                $table->string('nome'); // Nome do fornecedor
                $table->string('endereco'); // Endereço do fornecedor
                $table->string('telefone')->nullable(); // Telefone do fornecedor
                $table->string('email')->unique(); // Email do fornecedor
                $table->string('nuit')->unique(); // NUIT (Número de Identificação Tributária, único)
                $table->timestamps(); // Campos created_at e updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deleta a tabela de medicamento caso seja necessário reverter
        Schema::dropIfExists('medicamento');
        
        // Deleta a tabela de fornecedores caso seja necessário reverter
        Schema::dropIfExists('fornecedor');
        
        // Deleta a tabela de cliente caso seja necessário reverter
        Schema::dropIfExists('cliente');
    }
};
