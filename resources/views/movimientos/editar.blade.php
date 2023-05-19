@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Editar movimiento</h3>

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
                <select class="form-select" aria-label="Default select">
                    <option selected>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
        </div>

        <hr>

        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cedula" class="form-label">Documento de identidad</label> -->
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Documento de identidad">
            </div>
            <div class="my-3 col-6 ps-3">
                <!-- <label for="cedula" class="form-label">Documento de identidad</label> -->
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Documento de identidad">
            </div>
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3"></div>
            <div class="my-3 col-6 ps-3">
                <select class="form-select" aria-label="Default select">
                    <option selected>Estado</option>
                    <option value="vendido">Vendido</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>
        </div>

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <a href="{{ url('movimientos') }}" class="btn bg-secondary text-light">Cancelar</a>
            </div>
            <div class="ps-3">
                <input type="submit" href="" class="btn bg-rosaViejo text-light" value="Actualizar">
            </div>
        </div>
    </form>
</div>
@stop