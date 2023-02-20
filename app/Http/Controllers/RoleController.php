<?php

namespace App\Http\Controllers;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(
        private RoleRepository $roleRepository,
        private PermissionRepository $permissionRepository)
    { }

    public function index()
    {
        $roles = $this->roleRepository->fetchAll();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->getAll();
        $roles = $this->roleRepository->fetchAll();
        return view('admin.roles.create', compact(['permissions', 'roles']));
    }

    public function store(Request $request)
    {
        $roleData = $request->all();
        $this->roleRepository->createRole($roleData);
        return redirect('/roles')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->fetchAll();
        $currentPermissions = $role->permissions()->get()->pluck('id')->toArray();

        return view('admin.roles.edit', compact(['role', 'currentPermissions', 'permissions']));
    }

    public function update(Request $request, $id){
        $this->roleRepository->updateRole($id, $request);
        return redirect('/roles')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        $this->roleRepository->deleteRole($id);
        return redirect('/roles');
    }
}
