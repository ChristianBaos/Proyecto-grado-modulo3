<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Personas | SivWeb Online</title>
  </head>
  <body>

    <div class="container">


    <h3 class="text-center">Reporte Personas</h3>
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
      <th>Numero Documento</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Contacto</th>
      <th>Correo Electronico</th>
    </tr>

    <?php

    foreach($personas as $per){?>
      <tr>
        <td>{{$per->num_documento}}</td>
        <td>{{$per->nombre}}</td>
        <td>{{$per->apellido}}</td>
        <td>{{$per->contacto}}</td>
        <td>{{$per->email}}</td>
      </tr>
    <?php  }?>

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
