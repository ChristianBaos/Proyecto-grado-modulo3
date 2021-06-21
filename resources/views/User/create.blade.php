@extends ('layouts.layout')
@section ('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Usuario</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(array('url'=>'usuario','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Usuario</label>
            <div class="form-group">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Identificación</label>
            <div class="form-group">
                <input id="identification" type="text" class="form-control" name="identification" value="{{ old('identification') }}"  required autofocus>
                @if ($errors->has('identification'))
                <span class="help-block"><strong>{{ $errors->first('identification') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>
            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <label for="estado" class="col-md-4 control-label">Estado</label>
            <div class="form-group">
                <select type="text" name="estado" id="estado" class="form-control selectpicker" data-live-search="true" data-header="Tipos de Estados">
                                <option value="" disable>Seleccione El Estado:</option>
                                <option value="Activo"> Activo</option>
                                <option value="Inactivo"> Inactivo</option>
                </select>
            </div>
        </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">
                <span class="glyphicon glyphicon-remove"></span> Borras Campos </button>
                <a class="btn btn-info" type="reset" href="{{url('usuario')}}"><span class="glyphicon glyphicon-home"></span> Volver </a>
            </div>

	    {{Form::close()}}

 	</div>
 </div>
@endsection
