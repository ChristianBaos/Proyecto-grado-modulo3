@extends ('layouts.layout')
@section('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Usuario: {{$usuario->name}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

        {{Form::open(array('action'=>array('UserController@update',$usuario->id),'method'=>'patch'))}}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre Usuario</label>
            <div class="form-group">
                <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name}}" required autofocus>
                @if ($errors->has('name'))
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Identificación</label>
            <div class="form-group">
                <input id="identification" type="text" class="form-control" name="identification" value="{{$usuario->identification}}" required autofocus readonly>
                @if ($errors->has('identification'))
                <span class="help-block"><strong>{{ $errors->first('identification') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail</label>
            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{$usuario->email}}" required>
                @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Nueva Password</label>
            <div class="form-group">
                <input id="password" type="password" class="form-control" value="{{$usuario->password}}" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Nueva Password</label>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" value="{{$usuario->password}}" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Estado</label>
            <div class="form-group">
                <input id="estado" type="text" class="form-control" value="{{$usuario->estado}}" name="estado" required>
            </div>
        </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" >Actualizar</button>
                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Borras Campos </button>
                <a class="btn btn-info" type="reset" href="{{url('usuario')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
	    {{Form::close()}}

    </div>
</div>
@endsection
