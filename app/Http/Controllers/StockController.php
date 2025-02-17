<?php

namespace App\Http\Controllers;

use App\Models\Fornecedore;
use App\Models\Medicamento;
use App\Models\Stock;
use App\Models\Stock_Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class StockController extends Controller
{
    public function create(): View
    {
        $medicamentos = Medicamento::all();
        $fornecedores = Fornecedore::all();
        return view('stock.registar-stock', compact('medicamentos', 'fornecedores'));
    }

    public function show(): View
    {
        $stocks = Stock::with(['medicamento', 'fornecedor'])->get();

        return view('stock.stocks', compact('stocks'));
    }

    public function store(Request $request): RedirectResponse
    {
        //   dd($request);
        // Validação dos dados de entrada
        try {

            if ($request->designacao == 'Comprimido') {

                $request->validate([
                    'fornecedor_id' => ['required', 'integer'],
                    'medicamento_id' => ['required', 'integer'],
                    'composicao_unit' => ['required', 'integer'],
                    'comprimidos_por_cartela' => ['required', 'integer'],
                    'numero_de_cartelas' => ['required', 'integer'],
                    'preco' => ['required', 'numeric', 'between:0,999999.99'],
                    'validade' => ['required', 'date', 'after:today'],

                ]);

                // Verificar se já existe um estoque para o medicamento e fornecedor
                $existingStock = Stock::where('medicamento_id', $request->medicamento_id)
                    ->where('fornecedor_id', $request->fornecedor_id)
                    ->first();

                if ($existingStock) {
                    return redirect()->route('stocks')
                        ->with('error', 'Este estoque já existe para o fornecedor e medicamento informados.');
                }

                // Criar o novo estoque

                Stock::create([
                    'fornecedor_id' => $request->fornecedor_id,
                    'medicamento_id' => $request->medicamento_id,
                    'composicao_unit' => $request->composicao_unit,
                    'comprimidos_por_cartela' => $request->comprimidos_por_cartela,
                    'numero_de_cartelas' => $request->numero_de_cartelas,
                    'preco_por_cartela' => $request->preco,
                    'validade' => $request->validade,

                ]);
                return redirect()->route('stocks')
                    ->with('success', 'Estoque adicionado com sucesso!');
            } else {

                $request->validate([
                    'fornecedor_id' => ['required', 'integer'],
                    'medicamento_id' => ['required', 'integer'],
                    'composicao_unit' => ['required', 'integer'],
                    'quantidade_produto' => ['required', 'integer'],
                    'preco' => ['required', 'numeric', 'between:0,999999.99'],
                    'validade' => ['required', 'date', 'after:today'],

                ]);

                // Verificar se já existe um estoque para o medicamento e fornecedor
                $existingStock = Stock_Produto::where('medicamento_id', $request->medicamento_id)
                    ->where('fornecedor_id', $request->fornecedor_id)
                    ->first();

                if ($existingStock) {
                    return redirect()->route('stocks')
                        ->with('error', 'Este estoque já existe para o fornecedor e medicamento informados.');
                }


                // Criar o novo estoque

                $val = Stock_Produto::create([
                    'fornecedor_id' => $request->fornecedor_id,
                    'medicamento_id' => $request->medicamento_id,
                    'composicao_unit'  => $request->composicao_unit,
                    'quantidade' => $request->quantidade_produto,
                    'preco' => $request->preco,
                    'validade' => $request->validade

                ]);
                
                return redirect()->route('stocks')
                    ->with('success', 'Estoque adicionado com sucesso!');
            }
        } catch (\Exception $e) {
            return redirect()->route('stocks')
                ->with('error', 'Erro ao adicionar estoque: ' . $e->getMessage());
        }
    }


    public function alterarStock(Request $request, $id): View
    {
        $stock = Stock::with(['medicamento', 'fornecedor'])->find($id);
        $fornecedores = Fornecedore::all();
        $medicamentos = Medicamento::all();

        return view('stock.actualizar-stock', compact('stock', 'fornecedores', 'medicamentos'));
    }

    public function update(Request $request): RedirectResponse
    {

        // Validação dos dados de entrada
        $request->validate([
            'fornecedor_id' => ['required', 'integer'],
            'medicamento_id' => ['required', 'integer'],
            'composicao_unit' => ['required', 'integer'],
            'comprimidos_por_cartela' => ['required', 'integer'],
            'numero_de_cartelas' => ['required', 'integer'],
            'preco' => ['required', 'numeric', 'between:0,999999.99'],
            'validade' => ['required', 'date', 'after:today'],

        ]);

        // Atualiza o estoque
        $stock = Stock::findOrFail($request->id);

        $updated = $stock->update([
            'fornecedor_id' => $request->fornecedor_id,
            'medicamento_id' => $request->medicamento_id,
            'composicao_unit' => $request->composicao_unit,
            'comprimidos_por_cartela' => $request->comprimidos_por_cartela,
            'numero_de_cartelas' => $request->numero_de_cartelas,
            'preco_por_cartela' => $request->preco,
            'validade' => $request->validade,
        ]);



        return redirect()->route('stocks')->with('success', 'Estoque atualizado com sucesso!');
    }

    public function vendas(): View {
        $produtos = Stock::with(['fornecedor', 'medicamento'])->get();
        return view('vendas', compact('produtos'));
    }
}
