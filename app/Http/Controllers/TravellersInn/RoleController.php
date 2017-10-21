<?php

namespace App\Http\Controllers\TravellersInn;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\IRoleRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    private $_roleRepo;

    /**
     * RoleController constructor.
     * @param IRoleRepo $_roleRepo
     */
    public function __construct(IRoleRepo $_roleRepo)
    {
        $this->_roleRepo = $_roleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->_roleRepo->all($request);

        return view('travellers-inn.admin.role.index', compact('roles'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRoleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $this->_roleRepo->create($request->all());

        Session::flash('success', 'Role Successfully Created');

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->_roleRepo->find($id);
        return view('travellers-inn.admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $errorAjaxResponse = ['success'=>false,'error'=>true,'errorCode'=>500,'message'=>''];
        $role = $this->_roleRepo->find($id);

        if (!$role){
            return response($errorAjaxResponse);
        }
       return response()->json(['success'=>true,'error'=>false, 'data'=> $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request)
    {
        $role = ['id' => $request->id];
        $this->_roleRepo->update($request->all(), $role);

        Session::flash('success', 'Role updated');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = ['id' => $id];
        $this->_roleRepo->destroy($role);

        Session::flash('success', 'The role was successfully deleted.');
        return redirect()->route('role.index');

    }

    public function roleManagement($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('travellers-inn.admin.user.role-management', compact('user', 'roles'));
    }
}
