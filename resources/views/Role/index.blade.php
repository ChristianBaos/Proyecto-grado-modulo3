
@extends ('layouts.layout')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Crear Rol <a  href="role/create"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado De Roles</h3>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<th>Nombre Del Rol</th>
				    <th>Descripcion Del Rol</th>
				</thead>
                @foreach($roles as $rol)
				<tr>
					<td>{{$rol->name}}</td>
					<td>{{$rol->description}}</td>
					<td>
						<a href="{{URL::action('RoleController@edit',$rol->id)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
					  	<a href="" data-target="#modal-delete-{{$rol->id}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></a>
				   </td>
				</tr>
				@include('Role.modal')
				@endforeach
			</table>
		</div>
        {{$roles->render()}}
	</div>
</div>

@endsection
