<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MedicamentosController extends Controller
{

    public function create(): View
    {
        return view('medicamento.registar-medicamento');
    }

    public function alterarMedicamento(Request $request, $id): View
    {
        $medicamento = Medicamento::find($id);
        return view('medicamento.actualizar-medicamento', compact('medicamento'));
    }

    public function show(): View
    {
        $medicamentos = Medicamento::all();

        return view('medicamento.medicamentos', compact('medicamentos'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados de entrada
        $request->validate([
            'medicamento' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!ctype_upper(mb_substr($value, 0, 1))) {
                    $fail('O campo ' . $attribute . ' deve começar com uma letra maiúscula.');
                }
            }],
            'apresentacao' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!ctype_upper(mb_substr($value, 0, 1))) {
                    $fail('O campo ' . $attribute . ' deve começar com uma letra maiúscula.');
                }
            }],
            'medida' => ['required', 'string'],
        ]);

        // Verificar se o medicamento já existe (supondo que a coluna 'name' seja única)
        $existingMedicamento = Medicamento::where('Nome', $request->medicamento)->first();

        if ($existingMedicamento) {
            // Se o medicamento já existe, redirecionar com uma mensagem de erro
            return redirect()->route('medicamentos')
                ->with('error', 'Este medicamento já existe!'); // Mensagem de erro
        }

        // Criar o novo medicamento
        Medicamento::create([
            'nome' => $request->medicamento,
            'apresentacao' => $request->apresentacao,
            'unidade_medida' => $request->medida,
        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('medicamentos')
            ->with('success', 'Medicamento adicionado com sucesso!'); // Mensagem de sucesso
    }

    public function update(Request $request): RedirectResponse
    {
        // Validação dos dados de entrada
        $request->validate([
             'id'=>['required','integer'],
            'medicamento' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!ctype_upper(mb_substr($value, 0, 1))) {
                    $fail('O campo ' . $attribute . ' deve começar com uma letra maiúscula.');
                }
            }],
            'apresentacao' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!ctype_upper(mb_substr($value, 0, 1))) {
                    $fail('O campo ' . $attribute . ' deve começar com uma letra maiúscula.');
                }
            }],
            'medida' => ['required', 'string'],
        ]);
    
        // Encontra o medicamento pelo ID e atualiza os campos
    $medicamento = Medicamento::findOrFail($request->id);
    $medicamento->update([
        'name' => $request->input('medicamento'),
        'apresentacao' => $request->input('apresentacao'),
        'unidade_medida' => $request->input('medida'),
    ]);

    return redirect()->route('medicamentos')->with('success', 'Medicamento atualizado com sucesso!');
    }
}
