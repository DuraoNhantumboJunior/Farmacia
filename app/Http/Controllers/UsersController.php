<?php

namespace App\Http\Controllers;

use App\Models\Fornecedore;
use App\Models\Medicamento;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function showUsers(): View
    {
        $users = User::all();

        return view('utilizador.utilizadores',compact('users'));
    }
    

    public function dashboard(): View {
        $users = User::all()->count();
        $stock = Stock::all()->count();
        $fornecedores = Fornecedore::all()->count();
        $medicamentos = Medicamento::all()->count();

        return view('dashboard', compact('users','medicamentos','fornecedores','stock'));
    }

}
