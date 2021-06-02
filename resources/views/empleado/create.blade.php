@extends('adminlte::page')

@section('title', 'Nuevo Registro')

@section('content_header')
    <h1>Empelados</h1>
@stop

@section('content')

<h2>Crear Registro</h2>

<form action="/empleados" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class=" form-label">Emlpeado</label>
        <input type="text" id="nomempleado" name="nomempleado" class=" form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Estado</label>
        <input type="number" min="0" max="1" id="estado" name="estado" class=" form-control" tabindex="2" >
    </div>
    <a href="/empleados" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
@stop
