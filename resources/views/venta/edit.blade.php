@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')

<h2>Editar Registro</h2>

<form action="/ventas/{{$venta->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class=" form-label">ID Cliente</label>
        <input type="number" id="cliente_id" name="cliente_id" class=" form-control" tabindex="1" value="{{$venta->cliente_id}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">ID Empleado</label>
        <input type="text" id="empleado_id" name="empleado_id" class=" form-control" tabindex="2" value="{{$venta->empleado_id}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Fecha Venta</label>
        <input type="date" id="fechventa" name="fechventa" class=" form-control" tabindex="3" value="{{$venta->fechventa}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Total</label>
        <input type="number" step="any" value="0.00" id="montotal" name="montotal" class=" form-control" tabindex="4" value="{{$venta->montotal}}">
    </div>
    <a href="/ventas" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')

@stop
