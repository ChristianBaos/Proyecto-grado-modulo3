@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Tipo De Vehiculos</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
            {!!Form::open(array('url'=>'tipo_vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="id_tipo">Tipo De Vehiculo Numero:</label>
                                <input type="number" name="id_tipo" class="form-control" value="{{$idtipo}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="nombre">Nombre Del Tipo:</label>
                            <select type="text" name="nombre" id="nombre" class="form-control selectpicker" data-live-search="true" data-header="Listado De Los Tipos De Vehiculos">
                                <option value="" disable>Seleccione El Tipo De Vehiculo:</option>
                                <option value="Automovil"> Automovil</option>
                                <option value="Motocicleta"> Motocicleta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="descripcion">Descripcion: </label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Digite La Descripcion...">
                        </div>
                    </div>
                </div>
                        <div class="form-group">
                        <br>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
                                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
                                <a class="btn btn-info" type="reset" href="{{url('tipo_vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                        </div>
                                      
            {!!Form::close()!!}       
@endsection