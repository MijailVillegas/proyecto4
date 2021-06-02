@extends('adminlte::page')

@section('title', 'Crud')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')
<div class="item-content">
    <form action="/articulos-report" method="post" id="make_pdf" enctype="multipart/form-data">
        <a href="/dashboard" id="btn-back"><i class="fas fa-chevron-left"></i></a>
        <a href="articulos/create" class="btn btn-primary bmb-3">Nuevo</a>
        <a onclick="location.href='articulos/excel-export'" class="btn btn-primary bg-success border-2 bmb-3">Excel</a>
        @csrf
        <input type="hidden" name="hidden_html" id="hidden_html">
        <!--<input type="submit" value="PDF" class="btn btn-primary bg-danger border-2 bmb-3"-->
        <button type="button" name="create_pdf" id="create_pdf" class="btn btn-primary bg-danger border-2 bmb-3">PDF</button>
    </form>
</div>
   

    <table id="articulos" class="table table-dark table-striped table-bordered shadow-lg  mt-4" style="width: 100%">
        <thead class=" bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->codigo}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->cantidad}}</td>
                    <td>{{$articulo->precio}}</td>
                    <td>
                        <form action="{{ route('articulos.destroy', $articulo->id)}}" method="POST">
                            <a class="btn btn-info" href="/articulos/{{$articulo->id}}/edit">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="draw-chart" style="width: 900px; height: 500px;"></div>
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
        $('#articulos').DataTable({
            "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
        });
    });
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.arrayToDataTable([
          ['Artículo', 'Cantidad'],
          <?php
          foreach($articulos as $articulo){
            echo "['".$articulo["descripcion"]."', ".$articulo["cantidad"]."],";
          }
          ?>
      ]);

      var options = {
        title: 'Articulos',
        pinHole: 0.4
      };
      var chart_div = document.getElementById('draw-chart');
      var chart = new google.visualization.PieChart(chart_div);

    // Wait for the chart to finish drawing before calling the getImageURI() method.
    google.visualization.events.addListener(chart, 'ready', function () {
      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(chart_div.innerHTML);
    });

    chart.draw(data, options);
}
</script>
<script>
$(document).ready(function(){
    $('#create_pdf').click(function(){
        $('#hidden_html').val($('#draw-chart').html());
        $('#make_pdf').submit();
    })
});
</script>
@stop
