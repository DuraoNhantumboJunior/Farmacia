<?php

namespace App\Http\Controllers;

use App\Models\Fornecedore;
use App\Models\Medicamento;
use App\Models\Stock;
use App\Models\User;
use App\Models\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function showUsers(): View
    {
        $users = User::all();

        return view('utilizador.utilizadores', compact('users'));
    }


    public function dashboard(): View
    {
        // Obtém o ano corrente e o mês atual
        $anoCorrente = Carbon::now()->year;
        $mesCorrente = Carbon::now()->month;

        $users = User::all()->count();
        $stock = Stock::all()->count();
        $fornecedores = Fornecedore::all()->count();
        $medicamentos = Medicamento::all()->count();
        $auth = Auth::user()->type;

        // Consulta as vendas do ano corrente, agrupando por mês
        $vendasPorMes = DB::table('vendas')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('SUM(total) as total'))
            ->whereYear('created_at', $anoCorrente)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('mes', 'asc')
            ->get();

        // Inicialize o acumulado de vendas
        $acumulado = 0;
        $vendasAcumuladas = [];

        // Preenche os meses anteriores ao mês atual com 0
        for ($i = 1; $i < $mesCorrente; $i++) {
            $vendasAcumuladas[] = 0;  // Preenche com 0 para os meses anteriores
        }

        // Adiciona as vendas para os meses registrados
        foreach ($vendasPorMes as $venda) {
            $acumulado += $venda->total;
            $vendasAcumuladas[] = $acumulado;
        }

        // Preenche os meses futuros com 0
        for ($i = count($vendasAcumuladas); $i < 12; $i++) {
            $vendasAcumuladas[] = 0;  // Preenche com zero nos meses futuros
        }

        return view('dashboard', compact('users', 'medicamentos', 'fornecedores', 'stock', 'vendasAcumuladas','auth'));
    }

    public function alterarEstado($id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário é do tipo 'Master'
        if ($user->type === 'Master') {
            return response()->json(['message' => 'Não é possível alterar o estado do gerente (Master).'], 400);
        }

        // Alterna o estado se não for 'Master'
        $user->estado = $user->estado === 'activo' ? 'desativado' : 'activo';
        $user->save();

        return response()->json(['message' => 'Estado do usuário atualizado com sucesso!']);
    }

    public function alterarNivel($id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário é do tipo 'Master'
        if ($user->type === 'Master') {
            return response()->json(['message' => 'Não é possível alterar as permissões do gerente (Master).'], 400);
        }

        // Alterna o tipo de acesso se não for 'Master'
        $user->type = $user->type === 'normal' ? 'admin' : 'normal';
        $user->save();

        return response()->json(['message' => 'Nível de acesso atualizado com sucesso!']);
    }
}
