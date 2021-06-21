@extends ('layouts.layout')

@section('header')
@endsection

@section ('contenido')
@extends ('layouts.layout')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Listado De Tarifas Asignadas:</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Tipo Vehiculo</th>
                        <th>Valor/Hora</th>
                        <th>Estado</th>
                    </thead>
                    @foreach ($estados as $esta)
                    <tr>
                        <td>{{$esta->nombre}}</td>
                        <td>${{number_format($esta->valor_hora)}}</td>
                        <td>{{$esta->estado}}</td>                  
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection