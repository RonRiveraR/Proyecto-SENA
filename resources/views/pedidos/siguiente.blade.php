@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Registrar prendas del pedido</h3>

<div class="container d-flex justify-content-center">
    <form class="col-7" action="{{ url('pedidos/reg/cli') }}" method="post">
        @csrf


        <div class="container px-5 mt-3">
            <select class="form-select" aria-label="Default select" id="producto_id" name="producto_id" required>
                <option selected>Selecciona un producto de la lista</option>
                @if(!isset($producto[0]))
                <option>Ningún cliente registado.</option>
                @else
                @foreach($producto as $row)
                <option value=" {{$row->id}}">{{$row->nombre}}</option>
                @endforeach
                @endif
            </select>

        </div>


        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cantidad" class="form-label">Cantidad</label> -->
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
                <span class="error"></span>
            </div>
            <div class="my-3 col-6 ps-3">
                <select class="form-select" aria-label="Default select" id="talla" name="talla" required>
                    <option selected>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                <span class="error"></span>
            </div>
        </div>


        <input type="hidden" name="numeroDeOrden" value="{{ $numOrden }}">
        <input type="hidden" name="cliente_id" value="{{ $id }}">

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <a href="{{ url('pedidos') }}" class="btn bg-secondary text-light">Salir</a>
            </div>
            <div class="ps-3">
                <input type="submit" class="btn btn-danger bg-rosaViejo text-light" value="Siguiente prenda">
            </div>
        </div>

    </form>
</div>
@stop