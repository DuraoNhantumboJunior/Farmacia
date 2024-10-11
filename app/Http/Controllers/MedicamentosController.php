<?php

namespace App\Http\Controllers;

use App\Models\MedicamentosModels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{

    public function store(Request $request): RedirectResponse
{
    // Validação dos dados de entrada
    $request->validate([
        'nome' => ['required', 'string', 'max:255'],
        'apresentacao' => ['required', 'string', 'lowercase'],
        'medida' => ['required', 'string'],
    ]);

    // Verificar se o medicamento já existe (supondo que a coluna 'name' seja única)
    $existingMedicamento = MedicamentosModels::where('name', $request->nome)->first();
    
    if ($existingMedicamento) {
        // Se o medicamento já existe, redirecionar com uma mensagem de erro
        return redirect()->route('medicamentos')
            ->with('error', 'Este medicamento já existe!'); // Mensagem de erro
    }

    // Criar o novo medicamento
    MedicamentosModels::create([
        'name' => $request->nome,
        'apresentacao' => $request->apresentacao,
        'unidade_medida' => $request->medida,
    ]);

    // Redirecionar com uma mensagem de sucesso
    return redirect()->route('medicamentos')
        ->with('success', 'Medicamento adicionado com sucesso!'); // Mensagem de sucesso
}

}
