@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado De Clientes <a href="cliente/create">
                <button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
                <h3>Reporte Todos Los Clientes <a href="\imprimirClientes"><button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>
                @include('Cliente.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id Cliente</th>
                        <th>Numero Documento</th>
                        <th>Nombre Del Cliente</th>
                        <th>Apellido Del Cliente</th>
                        <th>Opciones</th>
                    </thead>
                    @if($clientes->count())
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id_cliente}}</td>
                        <td>{{$cliente->num_documento}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellido}}</td>
                    <td>
                        <a href="{{URL::action('ClienteController@edit',$cliente->id_cliente)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$cliente->id_cliente}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar </button></a>
                    </td>
                    </tr>
                    @include('Cliente.modal')                  
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">No hay registro de clientes !!</td>
                    </tr>
                    @endif
                </table>
            </div>
            {{$clientes->render()}}
        </div>
    </div>
@endsection
