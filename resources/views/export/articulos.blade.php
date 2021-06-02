<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/exports.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <div class="block">
                <img src="img/upds.jpg">
            </div>
            <div class="block">
                <h1 a>Reporte de Artículos</h1>
            </div>

            <div class="datos">
                <div>Usuario: Mijail Villegas Murillo</div>
                <div><a href="mailto:mfavillegas@gmail.com">mfavillegas@gmail.com</a></div>
            </div>

        </div>
    </header>
    <main>
        <div class="data-block">
            @if($data)
            {!!$data!!}
            @endif
        </div>
             <table>
                 <thead>
                     <tr>
                         <th>Código</th>
                         <th>Descripción</th>
                         <th>Cantidad</th>
                         <th>Precio</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($articulos as $articulo)
                         <tr>
                             <td class="unit">{{$articulo->codigo}}</td>
                             <td class="unit">{{$articulo->descripcion}}</td>
                             <td class="unit">{{$articulo->cantidad}}</td>
                             <td class="unit">{{$articulo->precio}}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
    </main>
 
    <footer>
        <!--<div class="footer">
            <div class="block-footer">
                <p>Representante</p>
            </div>-->
    </footer>
</body>
</html>
