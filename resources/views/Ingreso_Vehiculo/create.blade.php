@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Ingreso Vehiculo</h3>
        @if (count($errors)>0)
            <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        @endif
    {!!Form::open(array('url'=>'ingreso_vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

        <div class="form-group">
                <label for="id_ingreso">Ingreso De Vehiculo Numero:</label>
                    <input type="number" name="id_ingreso" class="form-control" value="{{($idingreso)}}" readonly>
        </div>

        <div class="form-group">
                <label for="Role">PLACA</label>
                    <select name="vehiculos_id_vehiculo" id="vehiculos_id_vehiculo" class="form-control selectpicker" data-live-search="true" data-header="Listado De Los Tipos De Vehiculo">
                        <option value="" selected>SELECCIONE LA PLACA DEL VEHICULO:</option>
                        @foreach($vehiculo as $vehiculo)
                        <option value="{{$vehiculo->id_vehiculo}}">ID: {{$vehiculo->id_vehiculo}} - Tipo: {{$vehiculo->nombre}} - Placa: {{$vehiculo->placa }}</option>
                        @endforeach
                    </select>
        </div>

            <div class="form-group">
                <label for="Valor">Fecha/Hora Ingreso Del Vehiculo</label>
                    <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control"  value="{{date('Y-m-d H:i:s') }}" readonly>
            </div>

            <!--<div class="form-group">
            <label for="estado">Estado</label>
                <input type="text" name="estado" class="form-control" placeholder="Estado. 1. Activo 0.Inactivo.">-->

            <div class="form-group">
                <label for="users_id">Usuario</label>
                    <select name="users_id" id="users_id" class="form-control selectpicker" data-livesearch="true">
                        <option value="{{auth()->user()->id}}" readonly>{{auth()->user()->name}}</option>
                    </select>
            </div>

            <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
                                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
                                <a class="btn btn-info" type="reset" href="{{url('ingreso_vehiculo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
    {!!Form::close()!!}
</div>
</div>
@endsection