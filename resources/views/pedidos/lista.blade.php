@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('contenido')


<h3 class="text-center mb-5">Elegir cliente</h3>

<form action="{{ url('pedido/clienteRegistrado') }}" method="post">
  @csrf
  <div class="container px-5">
    <div class="container px-5">
      <select class="form-select" aria-label="Default select" id="cliente" name="cliente" required>
        <option value="" selected>Selecciona un cliente de la lista</option>
        @if(!isset($data[0]))
        <option>Ningún cliente registado.</option>
        @else
        @foreach($data as $row)
        <option value=" {{$row->nombre}}">{{$row->nombre}}</option>
        @endforeach
        @endif
      </select>
      <input type="hidden" name="random" value="{{ $order }}">
      <div class="container-row d-flex justify-content-end mt-5 mb-5">
        <div class="pe-3">
          <a href="{{ url('pedidos') }}" class="btn bg-secondary text-light">Volver</a>
        </div>
        <div class="ps-3">
          <input type="submit" class="btn btn-danger bg-rosaViejo text-light" value="Continuar">
        </div>
      </div>
    </div>
  </div>
</form>

@stop