@extends ('layouts.layout')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Crear Usuario: <a href="usuario/create"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></a></h3>
		@include('User.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado De Usuarios:</h3>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Identifiación</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->identification}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					<td>{{ $usu->estado}}</td>
					<td>
						<a href="{{URL::action('UserController@edit',$usu->id)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar </button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Inactivar </button></a>
					</td>
				</tr>
				@include('User.modal')
				@endforeach


			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection
