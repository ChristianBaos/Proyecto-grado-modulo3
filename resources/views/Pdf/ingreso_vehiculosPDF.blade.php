<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ingreso Parqueadero | Parqueadero Vida Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte De Vehiculos Ingresados</h3>
        <br>
            <div align="center"><img src="fondos/FondoOpacidad20.png"  alt="" height="150px" width="100px"></div>
        <br>
        <h1 class="text-center">Parqueadero Vida</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Tipo Vehiculo</th>
                <th>Placa Del Vehiculo</th>
                <th>Fecha De Ingreso</th>
                <th>Usuario</th>
                <th>Estado</th>
            </tr>
            @foreach($ingreso as $in)
            <tr>
                <td>Identificador:{{$in->Id_Vehiculo}}<br>Tipo: {{$in->Nombre}}</td>
                <td>{{$in->Placa}}</td>
                <td>{{$in->Fecha_Ingreso}}</td>
                <td>{{$in->name}}</td>
                <td>{{$in->Estado}}</td>        
            </tr>
            @endforeach
        </table>
        <br>
        <br>
        <br>
        <h5 class="text-center">Usuario: {{auth()->user()->name}}</h5>
            <h6 align="center">Software de parqueadero version 1</h6>
    </div>
</body>

</html>