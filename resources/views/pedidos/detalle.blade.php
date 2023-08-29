@extends('layouts.layout')

@section('cabecera')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@stop

@section('contenido')

<div class="container">
  <div class="row">
    <?php $comparador = 0 ?>
    @foreach($data as $row)
    @if( $row->cliente->cedula != $comparador)
    <div class="col-6 text-end">
      <p><b>Nombre</b></p>
      <p><b>Documento de identtidad</b></p>
      <p><b>Telefono</b></p>
      <p><b>Direccion</b></p>
    </div>
    <div class="col-6">
      <p>{{ $row->cliente->nombre }}</p>
      <p>{{ $row->cliente->cedula }}</p>
      @if($row->cliente->telefono != null)
      <p>{{ $row->cliente->telefono }}</p>
      @else
      <p>-</p>
      @endif
      @if($row->cliente->direccion != null)
      <p>{{ $row->cliente->direccion }}</p>
      @else
      <p>-</p>
      @endif

    </div>
    <?php $comparador = $row->cliente->cedula ?>
    @endif
    @endforeach
  </div>
</div>

<div class="container px-5 mb-5">
  <table class="table px-5" id="tabla">
    <thead>
      <tr>
        <th scope="col">Prenda</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Talla</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $data as $row )
      <tr>
        <td>{{$row->producto->nombre}}</td>
        <td>{{$row->cantidad}}</td>
        <td>{{$row->talla}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@stop

@section('script')
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
@stop