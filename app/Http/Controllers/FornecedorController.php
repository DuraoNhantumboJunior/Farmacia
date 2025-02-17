<?php

namespace App\Http\Controllers;

use App\Models\Fornecedore;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function create(): View
    {
        return view('fornecedor.registar-fornecedor');
    }

    public function show(): View
    {
        $fornecedores = Fornecedore::all();
        return view('fornecedor.fornecedores', compact('fornecedores'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados de entrada
        $request->validate([
            'fornecedor' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'nuit' => ['required', 'numeric', 'digits:9'], // Exemplo de NUIT com 9 dígitos
        ]);

        // Verificar se o fornecedor já existe (supondo que o nome seja único)
        $existingFornecedor = Fornecedore::where('nome', $request->nome)->first();

        if ($existingFornecedor) {
            return redirect()->route('fornecedores')
                ->with('error', 'Este fornecedor já existe!');
        }

        // Criar o novo fornecedor
        Fornecedore::create([
            'nome' => $request->fornecedor,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'nuit' => $request->nuit,
        ]);

        return redirect()->route('fornecedores')
            ->with('success', 'Fornecedor adicionado com sucesso!');
    }

    public function alterarFornecedor(Request $request, $id): View
    {
        $fornecedor = Fornecedore::find($id);
        return view('fornecedor.actualizar-fornecedor', compact('fornecedor'));
    }

    public function update(Request $request): RedirectResponse
    {
        // Validação dos dados de entrada
        $request->validate([
            'id' => ['required','integer'],
            'fornecedor' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'nuit' => ['required', 'numeric', 'digits:9'],
        ]);

        // Atualiza o fornecedor
        $fornecedor = Fornecedore::findOrFail($request->id);
        $fornecedor->update([
            'nome' => $request->fornecedor,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'nuit' => $request->nuit,
        ]);

        return redirect()->route('fornecedores')->with('success', 'Fornecedor atualizado com sucesso!');
    }

}
