<?php

namespace App\Http\Controllers\TravellersInn;

use App\Models\Resource;
use App\Models\Role;
use App\Repositories\Contracts\IResourceRepo;
use App\Repositories\Contracts\IRoleRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResourceController extends Controller
{
    private $_resourceRepo;
    private $_roleRepo;

    public function __construct(IResourceRepo $_resourceRepo, IRoleRepo $_roleRepo)
    {
        $this->_resourceRepo = $_resourceRepo;
        $this->_roleRepo = $_roleRepo;
    }

    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = $this->_resourceRepo->fetchResources();
        return view('travellers-inn.admin.resource.index', compact('resources'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $resource = $this->_resourceRepo->find($id);

        return view('travellers-inn.admin.resource.show', compact('resource'));
    }

    /**
     * @param $role_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resourceManagement($role_id)
    {
        $role = $this->_roleRepo->find($role_id);
        $resources = $this->_resourceRepo->fetchResources();
        return view('travellers-inn.admin.role.resource-management', compact('role', 'resources'));
    }
}
