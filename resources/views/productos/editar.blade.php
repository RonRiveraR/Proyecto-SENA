@extends('layouts.layout')

@section('contenido')
<h3 class="text-center">Editar prenda</h3>

<div class="container d-flex justify-content-center">
    <form class="col-7" action="{{ url('productos/editar/'.$data->id) }}" method="post" id="formulario">
        @csrf
        @method('PUT')
        <div class="my-3">
            <!-- <label for="prenda" class="form-label">Prenda</label> -->
            <input type="text" class="form-control" name="prenda" id="prenda" placeholder="Prenda" autofocus value="{{ $data->nombre }}">
        </div>
        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="cantidad" class="form-label">Cantidad</label> -->
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" value="{{ $data->cantidad }}">
            </div>
            <div class="my-3 col-6 ps-3">
                @if($data->talla == 'xs')
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option selected value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                @elseif($data->talla == 's')
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option value="xs">XS</option>
                    <option selected value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                @elseif($data->talla == 'm')
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option selected value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                @elseif($data->talla == 'l')
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option selected value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                @elseif($data->talla == 'xl')
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option selected value="xl">XL</option>
                </select>
                @else
                <select class="form-select" aria-label="Default select" id="talla" name="talla">
                    <option>Talla</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
                @endif

            </div>
        </div>

        <hr>

        <div class="d-flex">
            <div class="my-3 col-6 pe-3">
                <!-- <label for="color" class="form-label">Cantidad</label> -->
                <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="{{ $data->color }}">
            </div>
            <div class=" my-3 col-6 ps-3">
                <!-- <label for="tipo class="form-label">Télefono</label> -->
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de tela" value="{{ $data->tipoDeTela }}">
            </div>
        </div>
        <div class=" my-3 form-floating">
            <textarea class="form-control" name="descripcion" placeholder="Descripción" id="descripcion" style="height: 100px" value="{{ $data->descripcion }}"></textarea>
            <label for=" direccion">Descripción</label>
        </div>

        <div class="container-row d-flex justify-content-end mb-5">
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
            cantidad: {
                required: true,
                number: true,
            },
            color: {
                required: true,
                maxlength: 50,
            },
            talla: {
                required: true,
                maxlength: 2,
            },
            tipo: {
                required: true,
                maxlength: 240
            },
            descripcion: {
                maxlength: 200
            }
        },
        messages: {
            nombre: {
                required: "Debes darle nombre a tu prenda",
                minlength: "Debe ser más de 8 caracteres",
                maxlength: "Debe ser menos de 100 carácteres"
            },
            cantidad: {
                required: "Debes ingresar una cantidad",
                number: "Debe ser un número"
            },
            color: {
                required: "Debes escribir un color",
                maxlength: "Debe ser menos de 50 carácteres"
            },
            talla: {
                required: "Debes seleccionar una talla",
                maxlength: "Debe ser menos de 240 carácteres"
            },
            tipo: {
                required: "Debes seleccionar tipo de tela",
                maxlength: "Debe ser menos de 240 carácteres"
            },
            descripcion: {
                maxlength: "Debe ser menos de 200 carácteres"
            },
        },
        errorElement: 'span'
    });
</script>



@stop