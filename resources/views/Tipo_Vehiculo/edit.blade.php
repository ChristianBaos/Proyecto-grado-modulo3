@extends ('layouts.layout')
@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Editar Vehiculo {{$tipo_vehiculo->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    {{Form::open(array('action'=>array('Tipo_VehiculoController@update', $tipo_vehiculo->id_tipo),'method'=>'patch'))}}
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="id_tipo">Tipo Vehiculo Numero:</label>
                    <input type="number" name="id_tipo" class="form-control" value="{{$tipo_vehiculo->id_tipo}}" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre Del Tipo:</label>
                        <select name="nombre" id="nombre"  class="form-control selectpicker" data-live-search="true">
                            @if($tipo_vehiculo->nombre=='Automovil')
                            <option value="{{$tipo_vehiculo->nombre}}" selected >{{$tipo_vehiculo->nombre}}</option>
                            <option value="Moticicleta" disabled >Moticicleta</option>
                            @elseif ($tipo_vehiculo->nombre=='Motocicleta')
                            <option value="Automovil" disabled >Automovil</option>
                            <option value="{{$tipo_vehiculo->nombre}}" selected >{{$tipo_vehiculo->nombre}}</option>
                            @endif
                        </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$tipo_vehiculo->descripcion}}">
                </div>
            </div>
        </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar </button>
                    <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-repeat"></span> Renovar</button>
                    <a class="btn btn-info" type="reset" href="{{url('tipo_vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                </div>   
        
	{{Form::close()}}

@endsection
