<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>Clientes | SivWeb Online</title>
    </head>
    <body>

        <div class="container">


            <h3 class="text-center">Reporte De Los Clientes</h3>
                <img align="right" src="" alt="" width='100px'>
            <br>
            <br>
                <h1 class="text-center">Ferro Miscelanea La 53</h1>
                <h3 class="text-center">NIT: 53625748-1</h3>
                <h3 class="text-center">Tel. 44463267</h3>
            <br>
            <br>
            <br>

                <table class="table table-bordered table-striped table-hover">

                    <tr>
                        <th>Cliente Numero</th>
                        <th>Numero Documento</th>
                        <th>Nombre Del Cliente</th>
                        <th>Apellido Del Cliente</th>
                    </tr>

                    <?php

                    foreach($clientes as $cli){?>
                        <tr>
                            <td>{{$cli->id_cliente}}</td>
                            <td>{{$cli->num_documento}}</td>
                            <td>{{$cli->nombre}}</td>
                            <td>{{$cli->apellido}}</td>
                        </tr>
                        <?php   }?>

                </table>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h6 align="center">SET Ingenieria, software de ventas version 1</h6>
        </div>
    </body>
</html>