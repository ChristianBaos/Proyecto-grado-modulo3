<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Salida_Vehiculo;
use App\Ingreso_Vehiculo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Salida_VehiculoFormRequest;
use DB;

use Carbon\Carbon;

class Salida_VehiculoController extends Controller
{
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
           /* $query=trim($request->get('searchText'));
            $salidas=DB::table('salida_vehiculos as save')
            ->join('ingreso_vehiculos as inve','inve.id_ingreso','=','save.ingreso_vehiculos_id_ingreso')
            ->join('vehiculos as ve','ve.id_vehiculo','=','inve.vehiculos_id_vehiculo')
            ->join('tipo_vehiculos as tive','tive.id_tipo','=','ve.tipo_vehiculos_id_tipo')
            ->join('tarifa_vehiculos as tave','tave.tipo_vehiculos_id_tipo','=','tive.id_tipo')
            ->select('save.id_ticket','inve.id_ingreso','inve.estado','tive.nombre','ve.placa','inve.fecha_ingreso','save.fecha_salida','tave.valor_hora','save.total')
            ->where('ve.placa','LIKE','%'.$query.'%')
            ->where('tave.estado','=','Activo')
            ->where('inve.estado','=','Inactivo')
            ->paginate(10);

            return view('Salida_Vehiculo.index',["salidas"=>$salidas,"searchText"=>$query]);*/
            $query=trim($request->get('searchText'));
            $salida=DB::table('vehiculos as v')
            ->join('ingreso_vehiculos as i','i.vehiculos_id_vehiculo', '=','v.id_vehiculo')
            ->join('tipo_vehiculos as tv','tv.id_tipo', '=','v.tipo_vehiculos_id_tipo')
            ->join('tarifa_vehiculos as t','tv.id_tipo', '=','t.tipo_vehiculos_id_tipo')
            ->select('i.id_ingreso','v.placa', 'tv.nombre', 'i.fecha_ingreso', 't.valor_hora')
            ->where('v.placa','LIKE','%'.$query.'%')->orderBy('id_ingreso', 'desc')
            ->where('t.estado','Activo')
            ->where('i.estado','Activo')->paginate(10);
            //dd($Salida);
         return view('Salida_Vehiculo.index',["Salida_vehiculos"=>$salida,"searchText"=>$query]);//
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(Request $request)
    {
        $request->user()->authorizeRoles(['operario','admin']);

        $idsalida = DB::table('salida_vehiculos')->max('id_ticket');
        if ($idsalida==0) {
          $idsalida=1;
        }else {
          $idsalida = $idsalida+1;
        }

        $idingreso = DB::table('ingreso_vehiculos as iv')
        ->join('vehiculos as v','iv.vehiculos_id_vehiculo','=','v.id_vehiculo')
        ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
        ->join('tarifa_vehiculos as t','tv.id_tipo','=','t.tipo_vehiculos_id_tipo')
        ->select('iv.id_ingreso','iv.estado','t.estado','v.placa')
        ->where('iv.estado','=','Activo')
        ->where('t.estado','=','Activo')
        ->get();

        return view ('Salida_Vehiculo.create',["idsalida"=>$idsalida, "idingreso"=>$idingreso]);
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Salida_VehiculoFormRequest $request)
    {
        /*$idingreso2 = $request->ingreso_vehiculos_id_ingreso;

        $ingreso =Ingreso_vehiculo::findOrFail($idingreso2);

        $mytime=Carbon::now('America/Bogota');

        $horas=$ingreso->fecha_ingreso->diffInHours();

        $minutos=$ingreso->fecha_ingreso->diffInMinutes();

        //dd($ingreso->fecha_ingreso->format('h:i'));

        $valor=DB::table('ingreso_vehiculos as iv')
            ->join('vehiculos as v','v.id_vehiculo', '=','iv.vehiculos_id_vehiculo')
            ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
            ->join('tarifa_vehiculos as t','t.tipo_vehiculos_id_tipo','=','tv.id_tipo')
            ->select('t.valor_hora')
            ->where('iv.id_ingreso','=',$request->ingreso_vehiculos_id_ingreso)
            ->get();
             //TRANFORMADO TODA ESA CONSULTA ARRAY, CONVERTIR EL ATRIBUTO VALOR_HORA EN VARIABLE
            foreach ($valor as $v) {
                $valor2=$v->valor_hora;
              }

        if($minutos > 14 && $minutos <= 59){ //SI ES MAYOR A 15 MINUTOS SE LE COBRA EL VALOR DE LA TARIFA

        $total=$valor2;

        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$request->get('id_ticket');
        //$mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$request->get('ingreso_vehiculos_id_ingreso');
        $salida->save();

        $ingreso->estado='Inactivo'; //Inactivo
        $ingreso->update();
        //return Redirect::to('salida_vehiculo');
        echo    "<script>
                        alert('Salida Del Vehiculo Exitosa');
                        window.location.href = 'salida_vehiculo';
                    </script>";
            exit;

        }elseif ($horas >= 1){ //SI ES MAYOR A UNA HORA ENTONCES APLICA EL VALOR DE LA TARIFA DIFERENTE

        $total=(1+$horas)*$valor2;

        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$request->get('id_ticket');
        $mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$request->get('ingreso_vehiculos_id_ingreso');
        $salida->save();

        $ingreso->estado='Inactivo'; //Inactivo
        $ingreso->update();
        //return Redirect::to('salida_vehiculo');
        echo    "<script>
                        alert('Salida Del Vehiculo Exitosa');
                        window.location.href = 'salida_vehiculo';
                    </script>";
            exit;

        }else{//NO A CUMPLIDO LOS 15 MINUTOS
        $total=$valor2*0;

        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$request->get('id_ticket');
        $mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$request->get('ingreso_vehiculos_id_ingreso');
        $salida->save();

        $ingreso->estado='Inactivo'; //Inactivo
        $ingreso->update();
        //return Redirect::to('salida_vehiculo');
        echo    "<script>
                        alert('Salida Del Vehiculo Exitosa');
                        window.location.href = 'salida_vehiculo';
                    </script>";
            exit;
        }*/
    }
    public function generarSalida($salida,$id_ingreso,$valor)
    {
        

        $mytime=Carbon::now('America/Bogota');
        $tarifa=Ingreso_Vehiculo::findOrFail($id_ingreso);
        $horas=$tarifa->fecha_ingreso->diffInHours();
        $minutos=$tarifa->fecha_ingreso->diffInMinutes();
        //$total= $horas*$valor;

        $idticket = DB::table('salida_vehiculos')->max('id_ticket');
        if ($idticket==0) {
          $idticket=1;
        }else {
          $idticket = $idticket+1;
        }

        $valor=DB::table('ingreso_vehiculos as iv')
            ->join('vehiculos as v','v.id_vehiculo', '=','iv.vehiculos_id_vehiculo')
            ->join('tipo_vehiculos as tv','tv.id_tipo','=','v.tipo_vehiculos_id_tipo')
            ->join('tarifa_vehiculos as t','t.tipo_vehiculos_id_tipo','=','tv.id_tipo')
            ->select('t.valor_hora')
            ->where('iv.id_ingreso','=',$id_ingreso)
            ->get();
             //TRANFORMADO TODA ESA CONSULTA ARRAY, CONVERTIR EL ATRIBUTO VALOR_HORA EN VARIABLE
            foreach ($valor as $v) {
                $valor2=$v->valor_hora;
              }

        if ($minutos > 14 && $minutos <= 59) {
            $total=$valor2;

        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$idticket;
        $mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$id_ingreso;
        $salida->save();

        $tarifa->estado='Inactivo'; //Inactivo
        $tarifa->update();

        } elseif ($horas >= 1){
            $total=(1+$horas)*$valor2;
           
        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$idticket;
        $mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$id_ingreso;
        $salida->save();

        $tarifa->estado='Inactivo'; //Inactivo
        $tarifa->update();
        } else{
            $total=$valor2*0;
            
        $salida=new Salida_Vehiculo;
        $salida->id_ticket=$idticket;
        $mytime=Carbon::now('America/Bogota');
        $salida->fecha_salida = $mytime->toDateTimeString();
        $salida->total = $total;
        $salida->ingreso_vehiculos_id_ingreso=$id_ingreso;
        $salida->save();

        $tarifa->estado='Inactivo'; //Inactivo
        $tarifa->update();
        }
        

        /*$salida= new Salida_Vehiculo;
        $salida->id_ticket=$idticket;
        $salida->fecha_salida=$mytime->toDateTimeString();
        $salida->Total=$total;
        $salida->ingreso_vehiculos_id_ingreso=$id_ingreso;
        $salida->save();
        
        $tarifa->estado='Inactivo';
        $tarifa->update();*/

        $salidaespecifico = DB::table('salida_vehiculos as s')
        ->join('ingreso_vehiculos as i', 'i.id_ingreso', '=', 's.ingreso_vehiculos_id_ingreso')
        ->join('vehiculos as v', 'v.id_vehiculo', '=', 'i.vehiculos_id_vehiculo')
        ->join('tipo_vehiculos as tv', 'tv.id_tipo', '=', 'v.tipo_vehiculos_id_tipo')
        ->select('i.id_ingreso','v.placa','i.fecha_ingreso','s.fecha_salida','tv.nombre','s.total')
        ->where('i.id_ingreso', '=', $id_ingreso)->get();
       
        
        foreach ($salidaespecifico as $sa) {
            $placavehiculo = $sa->placa;
            $fechaingreso = $sa->fecha_ingreso;
            $fechasalida = $sa->fecha_salida;
            $idingreso = $sa->id_ingreso;
            $tiponombre = $sa->nombre;
            $valortotal = $sa->total;
        }
       

        $pdf = \PDF::loadView('Pdf.salida_vehiculosPDF', [
            'placavehiculo' => $placavehiculo,
            'fechaingreso' => $fechaingreso,
            'fechasalida' => $fechasalida,
            'idingreso' => $idingreso,
            'tiponombre' => $tiponombre,
            'valortotal' => $valortotal,
            
        ]);

        
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Salida Especifico.pdf');
        
        return Redirect::to('Salida_vehiculo');
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
    public function update(Request $request, $id)
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
        /*$request->user()->authorizeRoles(['operario','admin']);

        $salida=Salida_Vehiculo::findOrFail($id);
        $salida->delete();
        //return Redirect::to('salida_vehiculo');
        echo    "<script>
                    alert('Ingreso Del Vehiculo Eliminado');
                    window.location.href = '/salida_vehiculo';
                </script>";
        exit;*/
    }
}
