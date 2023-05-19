@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('contenido')

<div class="container d-flex justify-content-end">
    <a href="{{ url('productos/nuevo') }}" class="btn bg-rosaViejo text-white">Registrar nueva prenda</a>
</div>

<h3 class="text-center">Productos</h3>

<div class="container px-5">
    <table class="table px-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Talla</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Color</th>
                <th scope="col">Tipo de tela</th>
                <th scope="col">Descripción</th>
                <th scope="col-1">Editar</th>
                <th scope="col-1">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Body halter</td>
                <td>M</td>
                <td>3</td>
                <td>Amarillo</td>
                <td>Seúl</td>
                <td></td>
                <td><a class="text-dark" href="#"><i class="fa-solid fa-pen-to-square fa-lg"></i></a></td>
                <td><a class="text-dark" href="#"><i class="fa-solid fa-trash fa-lg"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>

@stop