@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Registrar nuevo cliente</h3>

<div class="container d-flex justify-content-center mb-5">
    <form class="col-7" action="{{ url('clientes/nuevo/guardar') }}" method="post" id="formulario">
        @csrf
        <div class="my-3">
            <!-- <label for="nombre" class="form-label">Nombre de cliente</label> -->
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de cliente" autofocus>
            <span class="error"></span>
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cedula" class="form-label">Documento de identidad</label> -->
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Documento de identidad">
                <span class="error"></span>
            </div>
            <div class="my-3 col-6 ps-3">
                <!-- <label for="telefono" class="form-label">Télefono</label> -->
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Télefono">
                <span class="error"></span>
            </div>
        </div>
        <div class="my-3 form-floating">
            <textarea class="form-control" name="direccion" placeholder="Dirección" id="direccion" style="height: 100px"></textarea>
            <label for="direccion">Dirección</label>
            <span class="error"></span>
        </div>

        <div class="container-row d-flex justify-content-end">
            <div class="pe-3">
                <a href="{{ url('clientes') }}" class="btn bg-secondary text-light">Volver</a>
            </div>
            <div class="ps-3">
                <input type="submit" href="" class="btn btn-danger bg-rosaViejo text-light" value="Registrar">
            </div>
        </div>
    </form>
</div>
@stop

@section('script')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    $("#formulario").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 8,
                maxlength: 100,
            },
            cedula: {
                required: true,
                number: true,
                maxlength: 15,
            },
            telefono: {
                maxlength: 20,
            },
            direccion: {
                maxlength: 200
            }
        },
        messages: {
            nombre: {
                required: "Debes ingresar un nombre",
                minlength: "Debe ser más de 8 caracteres",
                maxlength: "Debe ser menos de 100 carácteres"
            },
            cedula: {
                required: "Debes ingresar documento de identidad",
                number: "Debe ser solo números",
                maxlength: "Debe ser menos de 15 carácteres"
            },
            telefono: {
                maxlength: "Debe ser menos de 20 carácteres"
            },
            direccion: {
                maxlength: "Debe ser menos de 200 carácteres"
            },
        },
        errorElement: 'span'
    });
</script>



@stop