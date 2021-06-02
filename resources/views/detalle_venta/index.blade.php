@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Detalle Ventas</h1>
@stop

@section('content')
<div class="item-content">
    <a href="/dashboard" id="btn-back"><i class="fas fa-chevron-left"></i></a>
    <a href="detalle_ventas/create" class="btn btn-primary bmb-3">Nuevo</a>
</div>
   

    <table id="ventas" class="table table-dark table-striped table-bordered shadow-lg  mt-4" style="width: 100%">
        <thead class=" bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">Venta</th>
            <th scope="col">Articulo</th>
            <th scope="col">Cantidad Vendido</th>
            <th scope="col">Precio Venta</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($detalle_ventas as $detalle_venta)
                <tr>
                    <td>{{$detalle_venta->id}}</td>
                    <td>{{$detalle_venta->venta_id}}</td>
                    <td>{{$detalle_venta->articulo_id}}</td>
                    <td>{{$detalle_venta->cantventa}}</td>
                    <td>{{$detalle_venta->precioventa}}</td>
                    <td>
                        <form action="{{ route('detalle_ventas.destroy', $detalle_venta->id)}}" method="POST">
                            <a class="btn btn-info" href="/detalle_ventas/{{$detalle_venta->id}}/edit">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://kit.fontawesome.com/f7210fbd0e.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#ventas').DataTable({
            "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
        });
    });
</script>
@stop
