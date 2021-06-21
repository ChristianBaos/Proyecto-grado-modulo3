

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Vehiculos | Sistema Web</title>
</head>

<body>
    
    <div class="container">
        <h3 class="text-center">Reporte Vehiculos Retirados </h3><img align="right" src="" alt="" width='100px'><br><br>

        
        <h1 class="text-center">Parqueadero Vida</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        @php
        $suma=0;
        @endphp
        <table class="table table-bordered table-striped table-hover">
        <div align="center"><img src="fondos/FondoOpacidad20.png"  alt="" height="150px" width="100px"></div>
        <br>
            <tr>
                <th># ingreso:</th>
                <th>Placa :</th>
                <th>Fecha Entrada:</th>
                <th>Fecha Salida:</th>
                <th>Total a pagar</th>

            </tr>@foreach($salida as $sa)<tr>
                <td>{{$sa->Id_Ingreso}}</td>
                <td>{{$sa->Placa}}</td>
                <td>{{$sa->Fecha_Ingreso}}</td>
                <td>{{$sa->Fecha_salida}}</td>
                <td>${{number_format($sa->Total)}}</td>
            </tr>
            @php
                $suma= $suma + $sa->Total;
        
                @endphp
            </tr>@endforeach

            <tr>
            <td colspan="4">Ingreso Total </td>
            <td style='background-color:#64A0D8;'>${{number_format($suma)}}</td>
        </table>


        <h6 align="center">Software de Parqueaderos version 1</h6>
    </div>
</body>

</html>



