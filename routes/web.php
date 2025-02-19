<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use App\Models\Medicamento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReciboController;
// Route::get('/', function () {
//     return view('login');
// });


Route::get('/dashboard', [UsersController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Rota da venda de medicamentos 
Route::get('/vendas', [StockController::class,'vendas'])->middleware(['auth', 'verified'])->name('vendas');

// Rota para stocar os medicamentos 
Route::get('/stocker', function () {
    return view('stock');
})->middleware(['auth', 'verified'])->name('stock');

// Rota para os relatórios do sistema 
Route::get('/relatorios', function () {
    return view('relatorios');
})->middleware(['auth', 'verified'])->name('relatorios');
require __DIR__ . '/auth.php';


//rotas da fase de testes 
Route::get('/registar-fornecedor', function () {
    return view('fornecedor.registar-fornecedor');
})->middleware(['auth', 'verified'])->name('registar-fornecedor');
require __DIR__ . '/auth.php';



Route::get('/registar-medicamento', function () {
    return view('medicamento.registar-medicamento');
})->middleware(['auth', 'verified'])->name('registar-medicamento');
require __DIR__ . '/auth.php';

Route::get('/actualizar-medicamento', function () {
    return view('medicamento.actualizar-medicamento');
})->middleware(['auth', 'verified'])->name('actualizar-medicamento');
require __DIR__ . '/auth.php';
Route::get('/stock', function () {
    return view('stock.stocks');
})->middleware(['auth', 'verified'])->name('stock');
require __DIR__ . '/auth.php';

Route::get('/actualizar-stock', function () {
    return view('stock.actualizar-stock');
})->middleware(['auth', 'verified'])->name('actualizar-stock');
require __DIR__ . '/auth.php';

Route::get('/registar-stock', function () {
    return view('stock.registar-stock');
})->middleware(['auth', 'verified'])->name('registar-stock');
require __DIR__ . '/auth.php';

Route::get('/fornecedores', function () {
    return view('fornecedor.fornecedores');
})->middleware(['auth', 'verified'])->name('fornecedores');
require __DIR__ . '/auth.php';

Route::get('/actualizar-fornecedor', function () {
    return view('fornecedor.actualizar-fornecedor');
})->middleware(['auth', 'verified'])->name('actualizar-fornecedor');
require __DIR__ . '/auth.php';

// Route::get('/utilizador', function () {
//     return view('utilizador.utilizadores');
// })->middleware(['auth', 'verified'])->name('utilizador');
// require __DIR__ . '/auth.php';

// Rotas no painel de controle 



Route::middleware('auth')->group(function () {
    Route::get('/registar-medicamento', [MedicamentosController::class, 'create']);
    Route::post('/armazenar-medicamento', [MedicamentosController::class, 'store'])->name('armazenar.medicamento');
    Route::get('/medicamentos', [MedicamentosController::class, 'show'])->name('medicamentos');
    Route::get('/actualizar-medicamento/{id}', [MedicamentosController::class, 'alterarMedicamento']);
    Route::put('/armazenar-medicamento-actualizado', [MedicamentosController::class, 'update'])->name('update.medicamento');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Rotas para Fornecedores
    Route::get('/registar-fornecedor', [FornecedorController::class, 'create'])->name('registar.fornecedor');
    Route::post('/armazenar-fornecedor', [FornecedorController::class, 'store'])->name('armazenar.fornecedor');
    Route::get('/fornecedores', [FornecedorController::class, 'show'])->name('fornecedores');
    Route::get('/actualizar-fornecedor/{id}', [FornecedorController::class, 'alterarFornecedor'])->name('actualizar.fornecedor');
    Route::put('/armazenar-fornecedor-actualizado', [FornecedorController::class, 'update'])->name('update.fornecedor');

     // Rotas para stock
     Route::get('/registar-stock', [StockController::class, 'create'])->name('registar-stock');
     Route::post('/armazenar-stock', [StockController::class, 'store'])->name('armazenar.stock');
     Route::get('/stock', [StockController::class, 'show'])->name('stocks');
     Route::get('/actualizar-stock/{id}', [StockController::class, 'alterarStock'])->name('actualizar.stock');
     Route::put('/armazenar-stock-actualizado', [StockController::class, 'update'])->name('update.stock');


     Route:: get('/utilizador', [UsersController::class, 'showUsers'])->name('utilizador');

    

// Route::get('/recibo/{id}', [ReciboController::class, 'gerarRecibo'])->name('recibo.gerar');
Route::get('/recibo', [ReciboController::class, 'gerarRecibo']);

});
