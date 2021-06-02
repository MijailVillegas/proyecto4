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
                <h1 a>Reporte de Clientes</h1>
            </div>

            <div class="datos">
                <div>Usuario: Mijail Villegas Murillo</div>
                <div><a href="mailto:mfavillegas@gmail.com">mfavillegas@gmail.com</a></div>
            </div>

        </div>
    </header>
    <main>
        <div class="center">
            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">C.I.</th>
                    </tr>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="center">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
    </main>
 
    <footer>
        <div class="footer">
            <div class="block-footer">
                <p>Firma Representante</p>
            </div>
    </footer>
</body>
</html>
