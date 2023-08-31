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
    //return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::controller(VistaController::class)->group(function () {
        /* INICIO */
        Route::get('inicio', 'inicio');

        /* PEDIDOS */
        Route::get('pedidos', 'pedidos');
        Route::get('pedidos/registrar', 'pedidosRegistrar');
        Route::post('pedido/reg/cli', 'registrarClientePorPedido');
        Route::post('pedidos/reg/cli', 'registrarPedido');
        Route::get('pedidos/clientes', 'listaClientes');
        Route::post('pedido/clienteRegistrado', 'pedidoEnClienteRegistrado');

        /* PEDIDOS, CRUD */
        Route::delete('pedidos/{dato}/eliminar', 'pedidoEliminar');
        //Route::get('pedidos/{dato}/editar', 'pedidoAEditar');
        Route::get('pedidos/{dato}/detalle', 'pedidoDetalle');
        Route::put('pedidos/{dato}/cambiar', 'pedidoEditarEstado');
        Route::put('pedidos/{dato}/cambiarPendiente', 'pedidoEditarEstadoAPendiente');

        /* CLIENTES */
        Route::get('clientes', 'clientes');
        Route::get('clientes/nuevo', 'clientesNuevo');
        Route::post('clientes/nuevo/guardar', 'clientesRegistrar');
        Route::get('clientes/{id}/editar', 'clientesAEditar');
        Route::put('clientes/editar/{id}', 'clientesEditar');
        Route::delete('clientes/{id}/eliminar', 'clientesEliminar');

        /* PRODUCTOS */
        Route::get('productos', 'productos')->name('productos');
        Route::get('productos/nuevo', 'productosNuevo');
        Route::post('productos/nuevo/guardar', 'productosRegistrar');
        Route::get('productos/{id}/editar', 'productosAEditar');
        Route::put('productos/editar/{id}', 'productosEditar');
        Route::delete('productos/{id}/eliminar', 'productosEliminar');

        //Route::get('movimientos', 'movimientos');
        //Route::get('movimientos/editar/{$id}', 'movimientosEditar');
    }); // FIN DE GRUPO DE FORMULARIOS



});

require __DIR__ . '/auth.php';
