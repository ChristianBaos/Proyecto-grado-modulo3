@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar El Rol: {{$role->description}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    
            {{Form::open(array('action'=>array('RoleController@update', $role->id),'method'=>'patch'))}}
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                        <br>
                        <label for="name">Nombre Del Rol</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                        <br>
                            <label for="description">Description Del Rol</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{$role->description}}">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" >Actualizar</button>
                        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Borras Campos </button>
                        <a class="btn btn-info" type="reset" href="{{url('role')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                        </div>  
                </div>                                   
            
            {!!Form::close()!!}  
        </div>
    </div>     
@endsection