@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/main.css">
@stop

@section('js')
<script src="https://kit.fontawesome.com/f7210fbd0e.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
<script src="/js/main.js"></script>
@stop

@section('content_header')
<div class="contenedor">
    <header>
        <div class="logo">
            <h1> ADMIN PAGE </h1>
            <p>Página de administración web</p>
        </div>
        @csrf
        <form action="">
            <input type="text" placeholder="Buscar..." name="" class="barra-busqueda" id="barra busqueda">
        </form>
        <div class="categorias" id="categorias">
            <a href="#" class="activo">Todos</a>
            <a href="#">CRUD</a>
            <a href="#">Gráficos</a>
            <a href="#">Reportes Generales</a>
        </div>
    </header>
    
</div>
@stop

@section('content')
<section class="grid" id="grid">
  <div class="item" 
  data-categories="reportes generales" 
  data-tags="ventas reportes general reporte excel">

    <div class="item-content">
      <!-- Safe zone, enter your custom markup -->
      <a href="ventas/excel-export"><img src="/img/carrito.png" alt=""></a> 
      <a href="ventas/excel-export" class="btn-admin" id="btn-admin">Reporte general de ventas Excel</a>
      <!-- Safe zone ends -->
    </div>
  </div>

    <div class="item" 
    data-categories="crud" 
    data-tags="articulos crud tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <a href="/articulos"><img src="/img/carrito.png" alt=""></a> 
        <a href="/articulos" class="btn-admin" id="btn-admin">Articulos</a>
        <!-- Safe zone ends -->
      </div>
    </div>

    <div class="item" 
    data-categories="crud" 
    data-tags="clientes crud tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <a href="/clientes"><img src="/img/articulos.jpeg" alt=""></a>
        <a href="/clientes" class="btn-admin" id="btn-admin">Clientes</a>
        <!-- Safe zone ends -->
      </div>
    </div>


    <div class="item" 
    data-categories="crud" 
    data-tags="empleados crud tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <a href="/empleados"><img src="/img/empleado.jpg" alt=""></a>
        <a href="/empleados" class="btn-admin" id="btn-admin">Empleados</a>
        <!-- Safe zone ends -->
      </div>
    </div>

    <div class="item" 
    data-categories="crud" 
    data-tags="ventas crud tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <a href="/ventas"><img src="/img/ventas.png" alt=""></a>
        <a href="/ventas" class="btn-admin" id="btn-admin">Ventas</a>
        <!-- Safe zone ends -->
      </div>
    </div>

    <div class="item" 
    data-categories="crud" 
    data-tags="detalle_ventas detalle venta crud tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <a href="/detalle_ventas"><img src="/img/detalle_venta.jpg" alt=""></a>
        <a href="/detalle_ventas" class="btn-admin" id="btn-admin">Detalle Ventas</a>
        <!-- Safe zone ends -->
      </div>
    </div>

    <div class="item" 
    data-categories="gráficos" 
    data-tags="graficos gráficos otros tablas">

      <div class="item-content">
        <!-- Safe zone, enter your custom markup -->
        <img src="/img/articulos.jpeg" alt="">
        <a href="#" class="btn-admin" id="btn-admin">Otros</a>
        <!-- Safe zone ends -->
      </div>
    </div>
    
    </div>
</section>

@stop