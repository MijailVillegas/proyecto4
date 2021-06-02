@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Detalle Ventas</h1>
@stop

@section('content')

<h2>Editar Registro</h2>

<form action="/detalle_ventas/{{$detalle_venta->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class=" form-label">ID Venta</label>
        <input type="number" id="venta_id" name="venta_id" class=" form-control" tabindex="1" value="{{$detalle_venta->venta_id}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">ID Articulo</label>
        <input type="text" id="articulo_id" name="articulo_id" class=" form-control" tabindex="2" value="{{$detalle_venta->articulo_id}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Cantidad Vendido</label>
        <input type="number" id="cantventa" name="cantventa" class=" form-control" tabindex="3" value="{{$detalle_venta->cantventa}}">
    </div>
    <div class="mb-3">
        <label for="" class=" form-label">Precio Venta</label>
        <input type="number" step="any" value="0.00" id="precioventa" name="precioventa" class=" form-control" tabindex="4" value="{{$detalle_venta->precioventa}}">
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
