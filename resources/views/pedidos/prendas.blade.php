@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Registrar prendas del pedido</h3>

<div class="container d-flex justify-content-center">
    <form class="col-7" action="" method="post">
        @csrf
        <div class="my-3">
            <!-- <label for="prenda" class="form-label">Nombre de cliente</label> -->
            <input type="text" class="form-control" name="prenda" id="prenda" placeholder="Prenda" autofocus>
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cantidad" class="form-label">Documento de identidad</label> -->
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
            </div>
            <div class="my-3 col-6 ps-3">
                <!-- <label for="talla" class="form-label">Télefono</label> -->
                <input type="text" class="form-control" name="talla" id="talla" placeholder="Talla">
            </div>
        </div>

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <input type="submit" class="btn bg-secondary text-light" value="Teminar">
            </div>
            <div class="ps-3">
                <input type="submit" class="btn bg-rosaViejo text-light" value="Siguiente prenda">
            </div>
        </div>
    </form>
</div>
@stop