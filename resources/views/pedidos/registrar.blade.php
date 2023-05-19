@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Registrar pedidos</h3>

<div class="container d-flex justify-content-center">
    <form class="col-7" action="" method="post">
        @csrf
        <div class="my-3">
            <!-- <label for="nombre" class="form-label">Nombre de cliente</label> -->
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de cliente" autofocus>
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cedula" class="form-label">Documento de identidad</label> -->
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Documento de identidad">
            </div>
            <div class="my-3 col-6 ps-3">
                <!-- <label for="telefono" class="form-label">Télefono</label> -->
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Télefono">
            </div>
        </div>
        <div class="my-3 form-floating">
            <textarea class="form-control" name="direccion" placeholder="Dirección" id="direccion" style="height: 100px"></textarea>
            <label for="direccion">Dirección</label>
        </div>

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <a href="{{ url('pedidos') }}" class="btn bg-secondary text-light">Volver</a>
            </div>
            <div class="ps-3">
                <input type="submit" href="" class="btn bg-rosaViejo text-light" value="Continuar">
            </div>
        </div>
    </form>
</div>
@stop