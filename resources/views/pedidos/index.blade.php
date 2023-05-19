@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('contenido')

<div class="container d-flex justify-content-end">
  <a href="{{ url('pedidos/registrar') }}" class="btn bg-rosaViejo text-white">Nuevo pedido</a>
</div>

<h3 class="text-center">Pedidos</h3>

<div class="container px-5">
  <table class="table px-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Télefono</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
        <th scope="col-1">Ver</th>
        <th scope="col-1">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Marian Martinez</td>
        <td>3004553355</td>
        <td>01-Ene-2023</td>
        <td>Pendiente</td>
        <td><a class="text-dark" href="#"><i class="fa-solid fa-eye fa-lg"></i></a></td>
        <td><a class="text-dark" href="#"><i class="fa-solid fa-trash fa-lg"></i></a></td>
      </tr>
    </tbody>
  </table>
</div>




@stop