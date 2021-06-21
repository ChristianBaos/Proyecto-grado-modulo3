<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use DB;

class ClienteController extends Controller
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
    
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente as cli')
            ->join('persona as per','per.num_documento','=','cli.num_documento')
            ->select('per.nombre','per.apellido','cli.id_cliente','cli.num_documento')
            ->where('cli.num_documento','LIKE','%'.$query.'%')
            ->orwhere('per.apellido','LIKE','%'.$query.'%')
            ->orderBy('id_cliente','desc')
            ->paginate(5);
            return view('Cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    $request->user()->authorizeRoles(['Administrador','Empleado']);

    $idcliente = DB::table('cliente')->max('id_cliente');
    if ($idcliente==0) {
      $idcliente=1;
    }else {
      $idcliente = $idcliente+1;
    }

    $documentocliente=DB::table('persona')
    ->whereNotIn('persona.num_documento', function($query){
        $query -> select('cliente.num_documento')
        ->from('cliente');
    })
    ->get();
        return view ('Cliente.create',["idcliente"=>$idcliente,"documentocliente"=>$documentocliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->id_cliente=$request->get('id_cliente');
        $cliente->num_documento=$request->get('num_documento');
        $cliente->save();
        return Redirect::to('cliente');
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
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Administrador','Empleado']);

        $cliente=Cliente::findOrFail($id);
        return view("Cliente.edit",["cliente"=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->id_cliente=$request->get('id_cliente');
        $cliente->num_documento=$request->get('num_documento');
        $cliente->update();
        return Redirect::to('cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Empleado']);
        
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return Redirect::to('cliente');
    }
}
