@extends ('layouts.layout')
@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Editar Vehiculo {{$vehiculo->id_vehiculo}}</h3>
            <br>
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

    {{Form::open(array('action'=>array('VehiculoController@update', $vehiculo->id_vehiculo),'method'=>'patch'))}}
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="id_vehiculo">Vehiculo Numero:</label>
                    <input type="number" name="id_vehiculo" class="form-control" value="{{$vehiculo->id_vehiculo}}" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_vehiculo_id_tipo">Tipo De Vehiculo</label>
                        <select name="tipo_vehiculos_id_tipo" id="tipo_vehiculos_id_tipo"  class="form-control selectpicker" data-live-search="true">
                            <option value="" selected>Seleccione El Tipo De Vehiculo A Modificar:</option>
                            @foreach ($tipovehiculo as $tipo)
                                    <option value="{{$tipo->id_tipo}}"  >Nombre: {{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="placa">Placa Del Vehiculo</label>
                    <input type="text" name="placa" id="placa" class="form-control" value="{{$vehiculo->placa}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar </button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-repeat"></span> Vaciar Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
        
	{{Form::close()}}
    @push('scripts')
        <script>
        
            $("#tipo_vehiculos_id_tipo").change(mostrarTipoV);


            function mostrarTipoV(){
                tv =  $("#tipo_vehiculos_id_tipo").val()
            
                if(tv==1)
                {
                    $('#placa').attr("pattern", '[A-Z]{3}[0-9]{3}|[a-z]{3}[0-9]{3}');
                }
                else if(tv==2)
                {
                    $('#placa').attr("pattern", '[A-Z]{3}[0-9]{2}[A-Z]|[a-z]{3}[0-9]{2}[a-z]');
                }
                    else {
                    $('#placa').attr("placeholder", "INGRESE PLACA");}
            }


        </script>
    @endpush            

@endsection
