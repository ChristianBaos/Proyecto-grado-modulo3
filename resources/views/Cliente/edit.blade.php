@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar El Cliente: {{$cliente->num_documento}}</h3>
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
    {{Form::open(array('action'=>array('ClienteController@update', $cliente->id_cliente),'method'=>'patch'))}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="id_cliente">Id Del Cliente</label>
                            <input type="number" name="id_cliente" id="id_cliente" class="form-control" value="{{$cliente->id_cliente}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="num_documento">Numero Documento Del Cliente</label>
                            <input type="number" name="num_documento" id="num_documento" class="form-control" value="{{$cliente->num_documento}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar </button>
                        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-repeat"></span> Vaciar Campos</button>
                        <a class="btn btn-info" type="reset" href="{{url('cliente')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                        </div>
                    </div>
                </div>
                                      
            {!!Form::close()!!}       
@endsection