<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests;
use DB;

class UserController extends Controller
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
    $request->user()->authorizeRoles('admin');
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->where('estado','=','Activo')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('User.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        
        return view("User.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
      $usuario=new User;
      $usuario->name = $request->get('name');
      $usuario->identification = $request->get('identification');
      $usuario->email = $request->get('email');
      $usuario->password = bcrypt($request->get('password'));
      $usuario->estado = $request->get('estado');
      $usuario->save();
      return Redirect::to('usuario');
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
        $request->user()->authorizeRoles('admin');

        return view("User.edit",["usuario"=>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $usuario=User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->identification = $request->get('identification');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->estado = $request->get('estado');
        $usuario->update();
        return Redirect::to('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');

        $usuario=User::findOrFail($id);
        $usuario->estado="Inactivo";
        $usuario->password = bcrypt("noexiste");
        $usuario->update();
        return Redirect::to('usuario');
    }
}
