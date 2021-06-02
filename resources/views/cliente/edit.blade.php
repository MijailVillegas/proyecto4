@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

<h2>Editar Registro</h2>

<form action="/clientes/{{$cliente->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class=" form-label">Nombre</label>
        <input type="text" id="nomcliente" name="nomcliente" class=" form-control" tabindex="1" value="{{$cliente->nomcliente}}">
        <label for="" class=" form-label">Apellido</label>
        <input type="text" id="apcliente" name="apcliente" class=" form-control" tabindex="2" value="{{$cliente->apcliente}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Teléfono</label>
        <input type="tel" id="telcliente" name="telcliente" class=" form-control" tabindex="2" value="{{$cliente->telcliente}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Email</label>
        <input type="email" id="emailcliente" name="emailcliente" class=" form-control" tabindex="3" value="{{$cliente->emailcliente}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Nacimiento</label>
        <input type="date" id="fechnaccliente" name="fechnaccliente" class=" form-control" tabindex="4" value="{{$cliente->fechnaccliente}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">C.I.:</label>
        <input type="text"  id="dniclient" name="dniclient" class=" form-control" tabindex="5" value="{{$cliente->dniclient}}">
    </div>
    <a href="/clientes" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')

@stop
