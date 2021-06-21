<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso_Vehiculo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Ingreso_VehiculoFormRequest;
use DB;

use Carbon\Carbon;

class Ingreso_VehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $request->user()->authorizeRoles(['oper','admin']);
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('ingreso_vehiculos as iv')
            ->join('vehiculos as v','v.id_vehiculo','=','iv.vehiculos_id_vehiculo')
            ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
            ->join('users as u','u.id','=','iv.users_id')
            ->select('iv.id_ingreso','iv.fecha_ingreso','u.name','iv.users_id',
            'iv.vehiculos_id_vehiculo','v.placa','iv.estado', 'tv.nombre')
            ->where('v.placa','LIKE','%'.$query.'%')
            ->where('iv.estado','Activo')
            ->orderBy('iv.id_ingreso','desc')
            ->paginate(5);

            return view('Ingreso_Vehiculo.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['oper','admin']);
        /*$vehiculo=DB::table('vehiculos as v')
            ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
            ->select('v.placa','v.id_vehiculo','tv.nombre')
            ->get();*/

        $vehiculo=DB::table('vehiculos as v')
        ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
        ->whereNotIn('v.id_vehiculo', function($query){
        $query -> select('ingreso_vehiculos.vehiculos_id_vehiculo')
        ->from('ingreso_vehiculos')
        ->where('ingreso_vehiculos.estado','=','Activo');
        })
        ->get();

        $idingreso = DB::table('ingreso_vehiculos')->max('id_ingreso');
        if ($idingreso==0) {
          $idingreso=1;
        }else {
          $idingreso = $idingreso+1;
        }

        return view('Ingreso_Vehiculo.create',["vehiculo"=>$vehiculo, "idingreso"=>$idingreso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Ingreso_VehiculoFormRequest $request)
    {
        $ciclo=$request->vehiculos_id_vehiculo; //Guardo el valor del nombre, por medio del formulario

        $existencia = DB::table('ingreso_vehiculos as iv') 
        ->join('vehiculos as v','v.id_vehiculo','=','iv.vehiculos_id_vehiculo')  
        ->select('iv.vehiculos_id_vehiculo')
        ->where('iv.vehiculos_id_vehiculo', '=', $ciclo)
        ->where('iv.estado','=','Activo')
        ->get(); //realizo la sentencia para saber si existe y si es acitvo
    
       if (count($existencia) >= 1) {   //aqui valido si son iguales en el campo de la db y 

            echo    "<script>
                        alert('El vehiculo actualmente esta en el parqueadero');
                        window.location.href = 'ingreso_vehiculo/create';
                    </script>";
            exit;
    
        }else{
        $ingreso=new Ingreso_vehiculo;
        $ingreso->id_ingreso=$request->get('id_ingreso');
        $mytime=Carbon::now('America/Bogota');
        $ingreso->fecha_ingreso = $mytime->toDateTimeString();
        $ingreso->estado='Activo';
        $ingreso->users_id=$request->get('users_id');
        $ingreso->vehiculos_id_vehiculo=$request->get('vehiculos_id_vehiculo');
        $ingreso->save();
        //return Redirect::to('ingreso_vehiculo');
        echo    "<script>
                        alert('Ingreso Del Vehiculo Registrado');
                        window.location.href = 'ingreso_vehiculo';
                    </script>";
            exit;
        }
    }

    public function cantidadVehiculos(Request $request ){
        $request->user()->authorizeRoles(['oper','admin']);
        if ($request)
        {
       
            $contador=DB::table('ingreso_vehiculos as iv')
            ->select('iv.id_ingreso')
            ->where('iv.estado','Activo')
            ->count('iv.id_ingreso')
            ->get();
            return view('Ingreso_Vehiculo.index',["ingresos"=>$contador]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ingreso_VehiculoFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        /*$request->user()->authorizeRoles('operario');

        $ingreso=Ingreso_Vehiculo::findOrFail($id);
        $ingreso->delete();
        //return Redirect::to('vehiculo');
            echo    "<script>
                        alert('Ingreso Del Vehiculo Eliminado');
                        window.location.href = '/ingreso_vehiculo';
                    </script>";
                exit;*/
    }
}
