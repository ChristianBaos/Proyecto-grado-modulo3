<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RoleFormRequest;
use App\Http\Requests;
use DB;

class RoleController extends Controller
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
            $roles=DB::table('roles')
            ->where('description','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('Role.index',["roles"=>$roles,"searchText"=>$query]);
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

        return view("Role.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $role=new Role;
        $role->name=$request->get('name');
        $role->description=$request->get('description');

        $role->save();

        return Redirect::to('role');
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

        return view("Role.edit",["role"=>Role::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, $id)
    {
        $role= Role::findOrFail($id);
        $role->name=$request->get('name');
        $role->description=$request->get('description');

        $role->update();

        return Redirect::to('role');
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

        $role=Role::findOrFail($id);
        $role->delete();

        return Redirect::to('role');
    }
}
