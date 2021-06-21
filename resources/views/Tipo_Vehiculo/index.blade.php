@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Crear Tipo De Vehiculo <a href="tipo_vehiculo/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
                <br>
                <h3>Buscar:</h3>           
                @include('Tipo_Vehiculo.search')
                <br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Listado De Los Tipo De Vehiculos </h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Tipo Número:</th>
                        <th>Tipo De Vehiculo</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </thead>
                    @if($tipos_vehiculos->count())
                    @foreach ($tipos_vehiculos as $tipo)
                    <tr>
                        <td>{{$tipo->id_tipo}}</td>
                        <td>{{$tipo->nombre}}</td>
                        <td>{{$tipo->descripcion}}</td>                  
                    <td>
                        <a href="{{URL::action('Tipo_VehiculoController@edit',$tipo->id_tipo)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$tipo->id_tipo}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar </button></a>
                    </td>
                    </tr>
                    @include('Tipo_Vehiculo.modal')
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">No hay registro de tipos de vehiculos !!</td>
                    </tr>
                    @endif
                </table>
            </div>
            {{$tipos_vehiculos->render()}}
        </div>
    </div>
@endsection
