<?php

namespace App\Http\Controllers;

use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
class PermissionController extends Controller
{
    public function __construct(
        private PermissionRepository $permissionRepository)
    { }
    public function index()
    {
        $permissions = $this->permissionRepository->fetchAll();
        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        $permissions = $this->permissionRepository->fetchAll();
        return view('admin.permissions.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $this->permissionRepository->createPermission($request->all());
        return redirect('/permissions')->with('success', 'Permission created successfully');
    }
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);
        return view('admin.permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id)
    {
        $this->permissionRepository->updatePermission($id, $request);
        return redirect('/permissions')->with('success', 'Permission updated successfully');
    }
    public function destroy($id)
    {
        $this->permissionRepository->deletePermission($id);
        return redirect('/permissions');
    }
}
