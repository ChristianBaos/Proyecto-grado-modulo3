@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado De Personas <a href="persona/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
                <h3>Reporte Todas Las Personas <a href="/imprimirPersonas"><button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>
                @include('Persona.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Numero Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Contacto</th>
                        <th>Opciones</th>
                    </thead>
                    @if($personas->count())
                    @foreach($personas as $persona)
                    <tr>
                        <td>{{$persona->num_documento}}</td>
                        <td>{{$persona->nombre}}</td>
                        <td>{{$persona->apellido}}</td>
                        <td>{{$persona->email}}</td>
                        <td>{{$persona->contacto}}</td>
                    <td>
                        <a href="{{URL::action('PersonaController@edit',$persona->num_documento)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$persona->num_documento}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar </button></a>
                    </td>
                    </tr>
                    @include('Persona.modal')                  
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">No hay registro de personas !!</td>
                    </tr>
                    @endif
                </table>
            </div>
            {{$personas->render()}}
        </div>
    </div>
@endsection
