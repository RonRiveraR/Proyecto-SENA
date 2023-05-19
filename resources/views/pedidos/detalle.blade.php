@extends('layouts.layout')

@section('contenido')

<div class="container">
  <div class="row ">
    <div class="col-6 text-end">
      <p><b>Nombre</b></p>
      <p><b>Documento de identtidad</b></p>
      <p><b>Telefono</b></p>
      <p><b>Direccion</b></p>
    </div>
    <div class="col-6">
      <p>Maria Martines</p>
      <p>10.455.455</p>
      <p>3004553355</p>
      <p>Av. Raul Casa 15 MRW Barinas</p>
    </div>
  </div>
</div>

<div class="container px-5">
  <table class="table px-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Prenda</th>
        <th scope="col">Talla</th>
        <th scope="col">Listo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Body Halter Amarillo</td>
        <td>S</td>
        <td>
          <select class="form-select" aria-label="Default select example" style="width: min-content;">
            <option selected value="1">No</option>
            <option value="2">Si</option>
          </select>
        </td>
      </tr>
      <tr class="texto-rosado">
        <th scope="row">2</th>
        <td>Body Sofia Rojo</td>
        <td>S</td>
        <td>
          <select class="form-select" aria-label="Default select example" style="width: min-content;">
            <option value="1">No</option>
            <option selected value="2">Si</option>
          </select>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Body Sofia Rojo</td>
        <td>S</td>
        <td>
          <select class="form-select" aria-label="Default select example" style="width: min-content;">
            <option selected value="1">No</option>
            <option value="2">Si</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="container px-5">
  <div class="row">
    <div class="col-3">
      <label for="">Estado</label>
      <select class="form-select" aria-label="Default select example">
        <option selected value="pendiente">Pendiente</option>
        <option value="listo">Listo</option>
      </select>
    </div>
    <div class="col-3"></div>
    <div class="col-3">
      <button class="btn bg-secondary">Volver</button>
    </div>
    <div class="col-3">
      <button class="btn bg-rosaViejo text-light">Actualizar</button>
    </div>
  </div>
</div>


@stop