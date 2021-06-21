@extends ('layouts.layout')
@section ('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Role</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(array('url'=>'role','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre Rol</label>
                <div class="form-group">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Descripcion Del Rol</label>
                <div class="form-group">
                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>
                    @if ($errors->has('description'))
                        <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                    @endif
                </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Borras Campos </button>
            <a class="btn btn-info" type="reset" href="{{url('role')}}"><span class="glyphicon glyphicon-home"></span> Volver </a>
        </div>

	{{Form::close()}}

 	</div>
 </div>
@endsection
