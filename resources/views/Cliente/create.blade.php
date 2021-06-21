@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Cliente</h3>
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
            {!!Form::open(array('url'=>'cliente','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="id_cliente">Id Cliente</label>
                            <input type="number" name="id_cliente" id="id_cliente" class="form-control" value="{{$idcliente}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="num_documento">Numero Documento Del Cliente</label>
                            <select type="number" name="num_documento" id="num_documento" class="form-control selectpicker" data-live-search="true" data-header="Seleccione El Cliente">
                                @foreach($documentocliente as $doccli)
                                <option value="{{$doccli->num_documento}}">Numero Documento: {{$doccli->num_documento}} Nombre: {{$doccli->nombre}} Apellido: {{$doccli->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
                                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
                                <a class="btn btn-info" type="reset" href="{{url('cliente')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                        </div>
                    </div>
                </div>
                                      
            {!!Form::close()!!}       
@endsection