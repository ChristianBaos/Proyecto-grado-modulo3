@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Registrar Ingresos <a href="ingreso_vehiculo/create">

                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>

        <script>
           
           
        </script>

        <!-- 
                <h3><a href="\imprimirIngreso_vehiculos">
                <button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span>Reporte Diario</button></a></h3> -->
        <br>
        <h3>Buscar:</h3>
        @include('Ingreso_Vehiculo.search')

    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @php
        $sql=('Select count(id_ingreso) from ingreso_vehiculos i where i.estado=Activo');
        $contador=0;
        @endphp
        @foreach ($ingresos as $in)
        @php
        $contador += $in->id_ingreso; 

        @endphp
        @endforeach
        
        <div class="table-responsive">
            <table id="prueba" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id Ingreso</th>
                    <th>Fecha Ingreso</th>
                    <th>Usuario</th>
                    <th>Vehiculo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                @if($ingresos->count())
                @foreach ($ingresos as $in)
                <tr>
                    <td>{{$in->id_ingreso}}</td>
                    <td>{{$in->fecha_ingreso}}</td>
                    <td>Nombre: {{auth()->user()->name}}</td>
                    <td>Placa: {{$in->placa}}<br>Tipo Vehiculo: {{$in->nombre}}</td>
                    <td>{{$in->estado}}</td>
                    <td>
                        <!--<a href="{{URL::action('Ingreso_VehiculoController@edit',$in->id_ingreso)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>-->
                        <!--<a href="" data-target="#modal-delete-{{$in->id_ingreso}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar </button></a>-->
                        <a href="/imprimirIngresoEspecifico/{{$in->id_ingreso}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Ticket</button></a>
                    </td>
                </tr>
                @include('Ingreso_Vehiculo.modal')
                @endforeach
                @else
                <tr>
                    <td colspan="8">No hay registro de vehiculos ingresados al parqueadero !!</td>
                </tr>
                @endif
            </table>
        </div>
        {{$ingresos->render()}}
    </div>
</div>
@endsection