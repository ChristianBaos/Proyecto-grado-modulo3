
@extends ('layouts.layout')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Asiginar Rol <a  href="usuario_role/create"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
       	@include('User_Role.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado De Usuario Con Rol</h3>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
				    <th>identificación</th>
					<th>Usuario</th>
				    <th>Rol Del Usuario</th>
				</thead>
                @foreach($user_role as $ur)
				<tr>
				    <td>{{$ur->identificacion}}</td>
					<td>{{$ur->name}}</td>
					<td>{{$ur->rol}}</td>
					<td>
					   <a href="" data-target="#modal-delete-{{$ur->id}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar</button></a>
				   </td>
				</tr>
				@include('User_Role.modal')
				@endforeach
			</table>
		</div>
		{{$user_role->render()}}
	</div>
</div>

@endsection
