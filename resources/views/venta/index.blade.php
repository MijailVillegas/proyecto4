@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
<div class="item-content">
    <a href="/dashboard" id="btn-back"><i class="fas fa-chevron-left"></i></a>
    <a href="ventas/create" class="btn btn-primary bmb-3">Nuevo</a>
</div>
   

    <table id="ventas" class="table table-dark table-striped table-bordered shadow-lg  mt-4" style="width: 100%">
        <thead class=" bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">ID Cliente</th>
            <th scope="col">ID Empleado</th>
            <th scope="col">Fecha numberenta</th>
            <th scope="col">Total</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->id}}</td>
                    <td>{{$venta->cliente_id}}</td>
                    <td>{{$venta->empleado_id}}</td>
                    <td>{{$venta->fechventa}}</td>
                    <td>{{$venta->montotal}}</td>
                    <td>
                        <form action="{{ route('ventas.destroy', $venta->id)}}" method="POST">
                            <a class="btn btn-info" href="/ventas/{{$venta->id}}/edit">Editar</a>
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
