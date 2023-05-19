@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('contenido')

<div class="container d-flex justify-content-end">
    <a href="{{ url('clientes/nuevo') }}" class="btn bg-rosaViejo text-white">Nuevo cliente</a>
</div>

<h3 class="text-center">Clientes</h3>

<div class="container px-5">
    <table class="table px-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Télefono</th>
                <th scope="col">Dirección</th>
                <th scope="col-1">Editar</th>
                <th scope="col-1">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Marian Martinez</td>
                <td>10.455.455</td>
                <td>3004553355</td>
                <td>Av. Raul Casa 15 MRW Barinas</td>
                <td><a class="text-dark" href="#"><i class="fa-solid fa-pen-to-square fa-lg"></i></a></td>
                <td><a class="text-dark" href="#"><i class="fa-solid fa-trash fa-lg"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>

@stop