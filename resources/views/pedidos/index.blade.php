@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@stop


@section('contenido')
<div class="container d-flex justify-content-end">
  <a href="{{ url('pedidos/registrar') }}" class="btn btn-danger bg-rosaViejo text-white">Nuevo pedido</a>
</div>

<h3 class="text-center">Pedidos Pendientes</h3>


@if(!isset($data[0]))
<div class="container px-5">
  <div class="container px-5">
    <p class="text-center">No hay pedidos realizados.</p>
  </div>
</div>
@else
<div class="container px-5 mb-5">
  <table class="table px-5" id="tabla">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Télefono</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
        <th scope="col-1">Eliminar</th>
        <!-- <th scope="col-1">Editar</th> -->
        <th scope="col-1">Ver</th>
        <th scope="col-1">Listo</th>
      </tr>
    </thead>
    <tbody>
      <?php $comparador = 0 ?>
      @foreach($data as $row)
      @if($row->numeroDeOrden != $comparador)
      @if($row->estado == 'pendiente')
      <tr class="text-danger">
        <td>{{ $row->cliente->nombre }}</td>
        <td>{{ $row->cliente->telefono }}</td>
        <td>{{ $row->updated_at }}</td>
        <td>{{ $row->estado }}</td>
        <td>
          <form action="{{ url('pedidos/'.$row->numeroDeOrden.'/eliminar') }}" id="formulario{{$row->numeroDeOrden}}" method="post">
            @csrf
            @method('DELETE')
            <a type="submit" id="{{ $row->numeroDeOrden }}" class="text-dark botonEliminar"><i class="fa-solid fa-trash fa-lg"></i></a>
          </form>
        </td>
        <!-- <td><a class="text-dark" href="{{ url('pedidos/'.$row->numeroDeOrden.'/editar') }}"><i class="fa-solid fa-edit fa-lg"></i></a></td> -->
        <td><a class="text-dark" href="{{ url('pedidos/'.$row->numeroDeOrden.'/detalle') }}"><i class="fa-solid fa-eye fa-lg"></i></a></td>
        <td>
          <form action="{{ url('pedidos/'.$row->numeroDeOrden.'/cambiar') }}" id="estado{{$row->numeroDeOrden}}" method="post">
            @csrf
            @method('PUT')
            <a class="text-dark botonEstado" id="{{ $row->numeroDeOrden }}" type="submit"><i class="fa-solid fa-check fa-lg"></i></a>
          </form>
        </td>
      </tr>
      <?php $comparador = $row->numeroDeOrden ?>
      @else
      <tr>
        <td>{{ $row->cliente->nombre }}</td>
        <td>{{ $row->cliente->telefono }}</td>
        <td>{{ $row->updated_at }}</td>
        <td>{{ $row->estado }}</td>
        <td> - </td>
        <!-- <td><a class="text-dark" href="{{ url('pedidos/'.$row->numeroDeOrden.'/editar') }}"><i class="fa-solid fa-edit fa-lg"></i></a></td> -->
        <td><a class="text-dark" href="{{ url('pedidos/'.$row->numeroDeOrden.'/detalle') }}"><i class="fa-solid fa-eye fa-lg"></i></a></td>
        <td>
          <form action="{{ url('pedidos/'.$row->numeroDeOrden.'/cambiarPendiente') }}" id="estadoPendiente{{$row->numeroDeOrden}}" method="post">
            @csrf
            @method('PUT')
            <a class="text-dark botonEstadoPendiente" id="{{ $row->numeroDeOrden }}" type="submit"><i class="fa-solid fa-xmark fa-lg"></i></a>
          </form>
        </td>
      </tr>
      <?php $comparador = $row->numeroDeOrden ?>
      @endif
      @endif
      @endforeach
      @endif
    </tbody>
  </table>
</div>

@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ( session('mensaje') == 'eliminado' )
<script>
  Swal.fire({
    icon: 'success',
    title: 'Pedido eliminado.',
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 10000,
    timerProgressBar: true,
  });
</script>
@endif
@if ( session('mensaje') == 'realizado' )
<script>
  Swal.fire({
    icon: 'success',
    title: 'Estado de pedido actualizado.',
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 10000,
    timerProgressBar: true,
  });
</script>
@endif
@if ( session('mensaje') == 'editado' )
<script>
  Swal.fire({
    icon: 'success',
    title: 'Pedido actualizado.',
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
        title: '¿Está seguro de eliminar este dato?',
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

    $('.botonEstado').click(function(e) {
      let id = $(this).attr('id');
      let formulario = "estado" + id
      e.preventDefault();
      Swal.fire({
        title: '¿Está seguro que el pedido está realizado?',
        text: "Asegurese que el pedido este realizado y enviado al cliente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, ya se envio!',
        cancelButtonText: 'No, aun no',
      }).then((result) => {
        if (result.isConfirmed) {
          $('#' + formulario).submit()
        }
      })
    });

    $('.botonEstadoPendiente').click(function(e) {
      let id = $(this).attr('id');
      let formulario = "estadoPendiente" + id
      e.preventDefault();
      Swal.fire({
        title: '¿Desea cambiar el estado a Pendiente?',
        text: "Este pedido cambiara de realizado a pendiente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, aún no se envio!',
        cancelButtonText: 'No, dejalo así',
      }).then((result) => {
        if (result.isConfirmed) {
          $('#' + formulario).submit()
        }
      })
    });


  })
</script>
@stop