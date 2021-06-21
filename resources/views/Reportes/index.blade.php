@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Reportes Parqueadero</h3>
        <a href="\imprimirVehiculosRetirados">
        <button class="btn btn-success">
            <span class="glyphicon glyphicon-download-alt">
            </span> Generar Reporte Diario</button></a>
            <p></p>
            <!--<h3>Listado De Salida De Vehiculos <a href="salida_vehiculo/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>-->
            
        </div>
    </div>
    
@endsection