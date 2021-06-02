@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<div class="item-content">
    <a href="/dashboard" id="btn-back"><i class="fas fa-chevron-left"></i></a>
    <a href="clientes/create" class="btn btn-primary bmb-3">Nuevo</a>
    <a onclick="location.href='cliente/excel-export'" class="btn btn-primary bg-success border-2 bmb-3">Excel</a>
    <a href="{{route('clientes.export')}}" class="btn btn-primary bg-danger border-2 bmb-3">PDF</a>
</div>
   

    <table id="clientes" class="table table-dark table-striped table-bordered shadow-lg  mt-4" style="width: 100%">
        <thead class=" bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Nacimiento</th>
            <th scope="col">C.I.</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nomcliente}}</td>
                    <td>{{$cliente->apcliente}}</td>
                    <td>{{$cliente->telcliente}}</td>
                    <td>{{$cliente->emailcliente}}</td>
                    <td>{{$cliente->fechnaccliente}}</td>
                    <td>{{$cliente->dniclient}}</td>
                    <td>
                        <form action="{{ route('clientes.destroy', $cliente->id)}}" method="POST">
                            <a class="btn btn-info" href="/clientes/{{$cliente->id}}/edit">Editar</a>
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
        $('#clientes').DataTable({
            "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
        });
    });
</script>

<div id='chart_div'></div>
@stop
