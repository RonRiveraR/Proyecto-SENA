@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('contenido')
@if(!isset($data[0]))
<div class="container px-5">
    <div class="container px-5">
        <p class="text-center">No hay pedidos pendientes.</p>
    </div>
</div>
@else
<?php $comparador = 0 ?>
@foreach($data as $row)
@if($row->numeroDeOrden != $comparador)
@if($row->estado == 'pendiente')
<div class="container px-5">

    <div class="alert bg-rosado mx-5" role="alert">
        <div class="d-flex justify-content-between px-4">
            <span><b>{{ $row->cliente->nombre }}</b> - {{ $row->estado }}</span>
            <a href="{{ url('pedidos/'.$row->numeroDeOrden.'/detalle') }}" class=" texto-rosaViejo">
                <i class="fa-solid fa-eye fa-lg"></i>
            </a>
        </div>
    </div>

</div>
@endif
@endif
<?php $comparador = $row->numeroDeOrden ?>
@endforeach
@endif


@stop