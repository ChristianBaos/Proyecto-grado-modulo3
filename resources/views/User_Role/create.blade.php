@extends ('layouts.layout')
@section ('contenido')

    <div class="row">
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Nuevo Rol Para Un Usuario</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!! Form::open(array('url'=>'usuario_role','method'=>'POST','autocomplete'=>'off'))!!}
            {{form::token()}}
            <div class="form-group">
                <label for="User">USUARIOS</label>
                    <select name="user_id" id="user_id" class="form-control selectpicker" data-live-search="true" required>
                        <option value="">SELECCIONE EL USUARIO ASIGNAR ROL:</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">Identificación: {{ $user->identification}} - Nombre: {{ $user->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="Role">ROLES</label>
                    <select name="role_id" id="role_id" class="form-control selectpicker" data-live-search="true" required>
                        <option value="">SELECCIONE EL ROL:</option>
                        @foreach($rol as $r)
                        <option value="{{$r->id}}">{{ $r->description }}</option>
                        @endforeach
                        </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Borras Campos </button>
                <a class="btn btn-info" type="reset" href="{{url('usuario_role')}}"><span class="glyphicon glyphicon-home"></span> Volver </a>
            </div>

            {{Form::close()}}
        </div>
    </div>
@endsection
