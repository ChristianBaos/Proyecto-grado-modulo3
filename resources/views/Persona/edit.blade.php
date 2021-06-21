@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar La Persona</h3>
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
    {{Form::open(array('action'=>array('PersonaController@update', $persona->num_documento),'method'=>'patch'))}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="num_documento">Numero Documento Del Cliente</label>
                            <input type="number" name="num_documento" id="num_documento" class="form-control" value="{{$persona->num_documento}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$persona->nombre}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="apellido">Apellido Completo</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{$persona->apellido}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="email">Correo Electronico</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$persona->email}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="contacto">Contacto</label>
                                <input type="text" name="contacto" id="contacto" class="form-control" value="{{$persona->contacto}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar </button>
                        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-repeat"></span> Vaciar Campos</button>
                        <a class="btn btn-info" type="reset" href="{{url('persona')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                        </div>
                    </div>
                </div>
                                      
            {!!Form::close()!!}       
@endsection