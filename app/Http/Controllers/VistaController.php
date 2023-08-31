<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class VistaController extends Controller
{
    //----------------------------------------------INICIO
    public function inicio()
    {
        $data = Pedido::all();
        return view('inicio', compact('data'));
    }

    //----------------------------------------------PEDIDOS

    public function pedidos()
    {
        $data = Pedido::all();
        //$data = Pedido::orderBy('created_at', 'DESC')->get();
        return view('pedidos.index', compact('data'));
    }

    public function pedidosRegistrar()
    {
        $order = rand(1000000000000, 9999999999999);
        return view('pedidos.registrar', compact('order'));
    }

    public function registrarClientePorPedido(Request $request)
    {
        $data['nombre'] = $request->get('nombre');
        $data['cedula'] = $request->get('cedula');
        $data['telefono'] = $request->get('telefono');
        $data['direccion'] = $request->get('direccion');

        $nombre = $request->get('nombre');

        Cliente::create($data);

        $cliente = Cliente::where('nombre', $nombre)->first();
        $producto = Producto::all();

        $random = $request->get('random');

        return view('pedidos.prendas', compact('random', 'cliente', 'producto'));
    }

    public function registrarPedido(Request $request)
    {
        Pedido::create($request->all());
        $id = $request->get('cliente_id');
        $numOrden = $request->get('numeroDeOrden');
        $producto = Producto::all();

        return view('pedidos.siguiente', compact('id', 'numOrden', 'producto'));
    }

    public function listaClientes()
    {
        $data = Cliente::all();
        $order = rand(1000000000000, 9999999999999);
        return view('pedidos.lista', compact('data', 'order'));
    }

    public function pedidoEnClienteRegistrado(Request $request)
    {
        $nombre = $request->get('cliente');
        $cliente = Cliente::where('nombre', $nombre)->first();
        $producto = Producto::all();

        $random = $request->get('random');

        return view('pedidos.prendas', compact('random', 'cliente', 'producto'));
    }

    //----------------------------------------------PEDIDOS, CRUD

    public function pedidoEliminar(Request $request, $dato)
    {
        $data = Pedido::where('numeroDeOrden', $dato);
        $data->delete();
        return redirect('pedidos')->with('mensaje', 'eliminado');
    }

    /* public function pedidoAEditar($dato)
    {
        $data = Pedido::find($dato);
        return view('pedidos.AEditar', compact('data'));
    } */

    public function pedidoDetalle($dato)
    {
        $data = Pedido::where('numeroDeOrden', $dato)->get();
        return view('pedidos.detalle', compact('data'));
    }

    public function pedidoEditarEstado($dato)
    {
        Pedido::where('numeroDeOrden', $dato)->update(['estado' => 'realizado']);
        return redirect('pedidos')->with('mensaje', 'editado');
    }

    public function pedidoEditarEstadoAPendiente($dato)
    {
        Pedido::where('numeroDeOrden', $dato)->update(['estado' => 'pendiente']);
        return redirect('pedidos')->with('mensaje', 'editado');
    }

    //----------------------------------------------CLIENTES

    public function clientes()
    {
        $data = Cliente::all();
        return view('clientes.index', compact('data'));
    }

    public function clientesNuevo()
    {
        return view('clientes.nuevo');
    }

    public function clientesRegistrar(Request $request)
    {
        Cliente::create($request->all());
        return redirect('clientes')->with('mensaje', 'registrado');
    }

    public function clientesAEditar($id)
    {
        $data = Cliente::find($id);
        return view('clientes.editar', compact('data'));
    }

    public function clientesEditar(Request $request, $id)
    {
        $data = $request->all();
        Cliente::find($id)->update($data);
        return redirect('clientes')->with('mensaje', 'actualizado');
    }

    public function clientesEliminar(Request $request, $id)
    {
        $data = Cliente::find($id);
        $data->delete();
        return redirect('clientes')->with('mensaje', 'eliminado');
    }

    //----------------------------------------------PRODUCTOS

    public function productos()
    {
        $data = Producto::all();
        return view('productos.index', compact('data'));
    }

    public function productosNuevo()
    {
        return view('productos.nuevo');
    }

    public function productosRegistrar(Request $request)
    {
        Producto::create($request->all());
        return redirect('productos')->with('mensaje', 'registrado');
    }

    public function productosAEditar($id)
    {
        $data = Producto::find($id);
        return view('productos.editar', compact('data'));
    }

    public function productosEditar(Request $request, $id)
    {
        $data = $request->all();
        Producto::find($id)->update($data);
        return redirect('productos')->with('mensaje', 'actualizado');
    }

    public function productosEliminar(Request $request, $id)
    {
        $data = Producto::find($id);
        $data->delete();
        return redirect('productos')->with('mensaje', 'eliminado');
    }

    //----------------------------------------------MOVIMIENTOS

    public function movimientos()
    {
        return view('movimientos.index');
    }

    public function movimientosEditar()
    {
        return view('movimientos.editar');
    }
}
