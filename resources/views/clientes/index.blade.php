@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@stop

@section('contenido')

<div class="container d-flex justify-content-end">
    <a href="{{ url('clientes/nuevo') }}" class="btn bg-rosaViejo btn-danger text-white">Nuevo cliente</a>
</div>

<h3 class="text-center">Clientes</h3>

@if(!isset($data[0]))
<div class="container px-5">
    <div class="container px-5">
        <p class="text-center">No hay clientes registrados.</p>
    </div>
</div>
@else
<div class="container px-5 mb-5">
    <table class="table px-5" id="tabla">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Télefono</th>
                <th scope="col">Dirección</th>
                <th scope="col-1">Editar</th>
                <th scope="col-1">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->cedula }}</td>
                @if($row->telefono==null)
                <td>-</td>
                @else
                <td>{{ $row->telefono }}</td>
                @endif
                @if($row->direccion==null)
                <td>-</td>
                @else
                <td>{{ $row->direccion }}</td>
                @endif
                <td>
                    <a href="{{ url('clientes/'.$row->id.'/editar') }}" class="text-dark"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                </td>
                <td>
                    <form action="{{ url('clientes/'.$row->id.'/eliminar') }}" id="formulario{{$row->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a type="submit" id="{{ $row->id }}" class="text-dark botonEliminar"><i class="fa-solid fa-trash fa-lg"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ( session('mensaje') == 'registrado' )
<script>
    Swal.fire({
        icon: 'success',
        title: 'Cliente registrado.',
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    });
</script>
@endif
@if ( session('mensaje') == 'actualizado' )
<script>
    Swal.fire({
        icon: 'success',
        title: 'Cliente actualizada.',
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    });
</script>
@endif
@if ( session('mensaje') == 'eliminado' )
<script>
    Swal.fire({
        icon: 'success',
        title: 'El cliente ha sido borrado.',
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    });
</script>
@endif
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    let table = new DataTable('#tabla', {
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json",
        }
    });
</script>
<script>
    $(document).ready(function() {

        $('.botonEliminar').click(function(e) {
            let id = $(this).attr('id');
            let formulario = "formulario" + id
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de eliminar este cliente?',
                text: "Una vez eliminado no podrá recuperarlo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, borralo!',
                cancelButtonText: 'No, lo necesito',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#' + formulario).submit()
                }
            })
        });

    })
</script>
@stop