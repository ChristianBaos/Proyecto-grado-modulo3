@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Vehiculo</h3>
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
            {!!Form::open(array('url'=>'vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="id_vehiculo">Vehiculo Numero:</label>
                                <input type="number" name="id_vehiculo" class="form-control" value="{{$idvehiculo}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <br>
                            <label for="tipo_vehiculos_id_tipo">Tipo De Vehiculo:</label>
                            <select type="number" name="tipo_vehiculos_id_tipo" id="tipo_vehiculos_id_tipo" class="form-control selectpicker" data-live-search="true" data-header="Listado De Los Tipos De Vehiculo">
                                <option value="" disable>Seleccione EL Tipo De Vehiculo:</option>
                                @foreach($tipo_vehiculo as $tipveh)   
                                <option value="{{$tipveh->id_tipo}}">{{$tipveh->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br>
                            <label for="placa">Placa Del Vehiculo</label>
                                <input type="text" name="placa" id="placa"  class="form-control" value="{{ old('placa') }}" placeholder="Digite La Placa Del Vehiculo...">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
                    <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
                    <a class="btn btn-info" type="reset" href="{{url('vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                </div>      
                                      
            {!!Form::close()!!}
            @push('scripts')
        <script>
        
            $("#tipo_vehiculos_id_tipo").change(mostrarTipoV);


            function mostrarTipoV(){
                tv =  $("#tipo_vehiculos_id_tipo").val()
            
                if(tv==1)
                {
                    $('#placa').attr("pattern", '[A-Z]{3}[0-9]{3}|[a-z]{3}[0-9]{3}');
                    $('#placa').attr("placeholder", "FORMATO PLACA: AAA123 o aaa123");
                }
                else if(tv==2)
                {
                    $('#placa').attr("pattern", '[A-Z]{3}[0-9]{2}[A-Z]|[a-z]{3}[0-9]{2}[a-z]');
                    $('#placa').attr("placeholder", "FORMATO PLACA MOTO: AAA12A o aaa12a");
                }
                    else {
                    $('#placa').attr("placeholder", "INGRESE PLACA");}
            }


        </script>
    @endpush            
@endsection