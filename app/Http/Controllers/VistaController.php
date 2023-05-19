<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaController extends Controller
{
    //----------------------------------------------INICIO
    public function inicio()
    {
        return view('inicio');
    }

    //----------------------------------------------PEDIDOS

    public function pedidos()
    {
        return view('pedidos.index');
    }

    public function registrarPedidos()
    {
        return view('pedidos.registrar');
    }

    public function registrarPedidosPrenda()
    {
        return view('pedidos.prendas');
    }

    //----------------------------------------------CLIENTES

    public function clientes()
    {
        return view('clientes.index');
    }

    public function clientesNuevo()
    {
        return view('clientes.nuevo');
    }

    //----------------------------------------------PRODUCTOS

    public function productos()
    {
        return view('productos.index');
    }

    public function productosNuevo()
    {
        return view('productos.nuevo');
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
