@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Editar prenda</h3>

<div class="container d-flex justify-content-center">
    <form class="col-7" action="" method="post">
        @csrf
        <div class="my-3">
            <!-- <label for="prenda" class="form-label">Prenda</label> -->
            <input type="text" class="form-control" name="prenda" id="prenda" placeholder="Prenda" autofocus>
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cantidad" class="form-label">Cantidad</label> -->
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
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
                <!-- <label for="color" class="form-label">Cantidad</label> -->
                <input type="text" class="form-control" name="color" id="color" placeholder="Color">
            </div>
            <div class="my-3 col-6 ps-3">
                <!-- <label for="tipo class="form-label">Télefono</label> -->
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de tela">
            </div>
        </div>
        <div class="my-3 form-floating">
            <textarea class="form-control" name="descripcion" placeholder="Descripción" id="descripcion" style="height: 100px"></textarea>
            <label for="direccion">Descripción</label>
        </div>

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <a href="{{ url('productos') }}" class="btn bg-secondary text-light">Cancelar</a>
            </div>
            <div class="ps-3">
                <input type="submit" href="" class="btn bg-rosaViejo text-light" value="Actualizar">
            </div>
        </div>
    </form>
</div>
@stop