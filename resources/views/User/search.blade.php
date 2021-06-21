{!! Form::open(array('url'=>'usuario','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar Por Nombre..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar </button>
		</span>
	</div>

	{{Form::close()}}
