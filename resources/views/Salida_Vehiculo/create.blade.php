@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Salida Vehiculo</h3>
        @if (count($errors)>0)
            <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        @endif
    {!!Form::open(array('url'=>'salida_vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

        <div class="form-group">
                <label for="id_ticket">Ticket Numero:</label>
                    <input type="number" id="id_ticket" name="id_ticket" class="form-control" value="{{($idsalida)}}" readonly>
        </div>

        <div class="form-group">
                <label for="ingreso_vehiculos_id_ingreso">PLACA</label>
                    <select name="ingreso_vehiculos_id_ingreso" id="ingreso_vehiculos_id_ingreso" class="form-control selectpicker" data-livesearch="true">
                        <option value="" selected>SELECCIONE El VEHICULO A SALIR:</option>
                        @foreach($idingreso as $i)
                        <option value="{{$i->id_ingreso}}">Placa: {{$i->placa}} - ID Ingreso: {{ $i->id_ingreso }}</option>
                        @endforeach
                    </select>
        </div>

            <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
                                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
                                <a class="btn btn-info" type="reset" href="{{url('salida_vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
    {!!Form::close()!!}
</div>
</div>
@endsection