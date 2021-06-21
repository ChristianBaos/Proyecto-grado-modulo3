@extends ('layouts.layout')
@section ('contenido')

<div class="row">


    {!! Form::open(array('url'=>'imprimirVehiculosRetirados','method'=>'GET','autocomplete'=>'off')) !!}
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Reporte Vehiculos Retirados</h3>

        <tr>

        </tr>
        <div class="input-group">

        <div class="col-xs-6">
                <td><label>Fecha Inicio</label><input  type="datetime-local" name="f1" class="form-control">
                </div>

                <div class="col-xs-6">
                <td><label>Fecha Fin</label><input type="datetime-local" name="f2" class="form-control"></td>
                
                </div>

                <div class="col-xs-6">
                <p></p>
                <td><a href="\imprimirVehiculosRetirados"><button class="btn btn-success">
                <span class="glyphicon glyphicon-download-alt">
                </span>Reporte Diario</button></a></td>
                
                </div>
                
        </div>
        
        <br>
        {{Form::close()}}


        <h3>Buscar</h3>
        @include('Salida_Vehiculo.search')
        <br>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Listado De Vehiculo Activos En El Parqueadero</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id Ingreso</th>
                    <th>Fecha_Ingreso</th>
                    <th>Placa</th>
                    <th>Nombre</th>
                    <th>Valor * Hora</th>
                    <th>Opciones</th>
                </thead>

                @foreach ($Salida_vehiculos as $salida)<tr>
                    <td>{{ $salida->id_ingreso}}</td>
                    <td>{{ $salida->fecha_ingreso}}</td>
                    <td>{{ $salida->placa}}</td>
                    <td>{{ $salida->nombre}}</td>
                    <td>${{number_format($salida->valor_hora)}}</td>
                    <td>
                        <a href="{{route('Salida_vehiculos',[$salida->placa,$salida->id_ingreso,$salida->valor_hora])}}">
                            <button class="btn btn-info"><span class=" glyphicon glyphicon-usd"></span>Generar Factura</button></a>

                    </td>

                </tr>@endforeach
            </table>
        </div>
        {{$Salida_vehiculos->render()}}
    </div>

    <!--
    {!! Form::open(array('url'=>'imprimirVehiculosRetirados','method'=>'GET','autocomplete'=>'off')) !!}


    <div class="form-group col-lg-2">

        <label>Fecha Inicio</label>
        <input type="datetime-local" name="f1" class="form-control">

        <label>Fecha Fin</label>
        <input type="datetime-local" name="f2" class="form-control">

        <p></p>
        <a href="\imprimirVehiculosRetirados"><button class="btn btn-warning">
                <span class="glyphicon glyphicon-download-alt">
                </span> Generar PDF por rango</button></a></h3>
    </div>

    {{Form::close()}} -->
</div>
@endsection