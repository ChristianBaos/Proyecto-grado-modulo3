{!! Form::open(array('url'=>'vehiculo','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar Placa Del Vehiculo..." value="{{$searchText}}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar </button>
            </span>
    </div>
</div>
{{Form::close()}}