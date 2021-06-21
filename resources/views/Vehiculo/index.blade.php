@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Crear Vehiculo <a href="vehiculo/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
                <h3>Reporte Todos Los Vehiculos <a href="\imprimirVehiculos"><button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>
                <br>
                <h3>Buscar:</h3>
                @include('Vehiculo.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado De Vehiculos:</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Vehiculo Número:</th>
                        <th>Tipo Vehiculo</th>
                        <th>Placa</th>
                        <th>Opciones</th>
                    </thead>
                    @if($vehiculos->count())
                    @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td>{{$vehiculo->id_vehiculo}}</td>
                        <td>{{$vehiculo->nombre}}</td>
                        <td>{{$vehiculo->placa}}</td>                  
                    <td>
                        <a href="{{URL::action('VehiculoController@edit',$vehiculo->id_vehiculo)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$vehiculo->id_vehiculo}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar </button></a>
                        <a href="/imprimirVehiculoEspecifico/{{$vehiculo->id_vehiculo}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
                    </td>
                    </tr>
                    @include('Vehiculo.modal')
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">No hay registro de vehiculos !!</td>
                    </tr>
                    @endif
                </table>
            </div>
            {{$vehiculos->render()}}
        </div>
    </div>
@endsection
