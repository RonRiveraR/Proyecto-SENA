<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::controller(VistaController::class)->group(function () {
    Route::get('inicio', 'inicio');

    Route::get('pedidos', 'pedidos');
    Route::get('pedidos/registrar', 'registrarPedidos');
    Route::get('pedidos/registrar/prenda', 'registrarPedidosPrenda');


    Route::get('clientes', 'clientes');
    Route::get('clientes/nuevo', 'clientesNuevo');
    //Route::get('clientes/editar/{$id}', 'clientesEditar');


    Route::get('productos', 'productos');
    Route::get('productos/nuevo', 'productosNuevo');
    //Route::get('productos/editar/{$id}', 'productosEditar');

    Route::get('movimientos', 'movimientos');
    //Route::get('movimientos/editar/{$id}', 'movimientosEditar');
});
