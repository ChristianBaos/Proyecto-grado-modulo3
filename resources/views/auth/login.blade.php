@extends('layouts.app')

@section('content')
<img src="../fondos/vida_espejo.png" alt="" class="imagen">
<div class="container" id="login-container">

    <div id="contenidologin">
        <div class="panel-heading" id="encabezadologin">INICIAR SESIÓN</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="formulario">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-md-6">
                        <input placeholder="Correo electrónico" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                    <div class="col-md-6">
                        <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">

                    <button id="login" type="submit" class="btn btn-primary">
                        Ingresar
                    </button>



                </div>
            </form>
        </div>
    </div>
</div>
@endsection