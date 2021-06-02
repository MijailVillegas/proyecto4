@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')

<h2>Crear Registro</h2>

<form action="/articulos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class=" form-label">Código</label>
        <input type="text" id="codigo" name="codigo" class=" form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" class=" form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" class=" form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Precio</label>
        <input type="number" step="any" value="0.00" id="precio" name="precio" class=" form-control" tabindex="4">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
@stop
