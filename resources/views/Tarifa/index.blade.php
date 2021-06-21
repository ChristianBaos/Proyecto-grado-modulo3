@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <a href="tarifas_inactivas"><button class="btn btn-primary">Detalles</button></a>
            <h3>Crear Tarifa <a href="tarifa/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
                <br>
                <h3>Buscar:</h3>   
                @include('Tarifa.search')
                <br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Listado De Tarifas Asignadas:</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Tarifa Número:</th>
                        <th>Tipo Vehiculo</th>
                        <th>Valor/Hora</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                    @if($tarifas->count())
                    @foreach ($tarifas as $ta)
                    <tr>
                        <td>{{$ta->id_tarifa}}</td>
                        <td>{{$ta->nombre}}</td>
                        <td>${{number_format($ta->valor_hora)}}</td>
                        <td>{{$ta->estado}}</td>                  
                    <td>
                        <!--<a href="{{URL::action('TarifaController@edit',$ta->id_tarifa)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar Tarifa </button></a>-->
                        <a href="" data-target="#modal-delete-{{$ta->id_tarifa}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Inactivar Tarifa </button></a>
                    </td>
                    </tr>
                    
                    @include('Tarifa.modal')
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">No hay registro de tarifas !!</td>
                    </tr>
                    @endif
                </table>
            </div>
            {{$tarifas->render()}}
        </div>
    </div>
@endsection
