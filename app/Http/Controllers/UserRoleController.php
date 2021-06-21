<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserRole;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRoleFormRequest;
use App\Http\Requests;
use DB;

class UserRoleController extends Controller
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
            $user_role=DB::table('role_user as ru')
            ->join('users as u','u.id','=','ru.user_id')
            ->join('roles as ro','ro.id','=','ru.role_id')
            ->select('ru.id','u.name','ro.name as rol','u.identification as identificacion')
            ->where('u.name','LIKE','%'.$query.'%')
            ->orwhere('ro.name','LIKE','%'.$query.'%')
            ->orderBy('ru.id','desc')
            ->paginate(10);
            return view('User_Role.index',["user_role"=>$user_role,"searchText"=>$query]);
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
        ////array Roles
        $rol=DB::table('roles')
        ->select('roles.description', 'roles.id')
        ->get();
   
        ////array Users
       /*$users=DB::table('users as e')
       ->select(DB::raw('CONCAT(e.id, " " ,e.name, " ",e.email) as users'),'e.id')
       ->get();*/

       $users=DB::table('users')
       ->select('users.name','users.identification','users.id')
       ->where('users.estado','=','Activo')
        ->get();
      
        return view('User_Role.create',["rol"=>$rol,"users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRoleFormRequest $request)
    {
        $user_role=new UserRole;
        $user_role->role_id=$request->get('role_id');
        $user_role->user_id=$request->get('user_id');
        $user_role->save();

        return Redirect::to('usuario_role');
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
    public function update(UserRoleFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('admin');
   
        $user_role=UserRole::findOrFail($id);
        $user_role->delete();

        return Redirect::to('usuario_role');
    }
}
