<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserReq;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
        private RoleRepository $roleRepository)
    { }
    public function index()
    {
        $users = $this->userRepository->fetchAll();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = $this->roleRepository->fetchAll();
        return view('admin.users.create', compact('roles'));
    }
    public function store(AddUserReq $request)
    {
        $this->userRepository->createUser( $request->all());
        return redirect('/users')->with('success', 'User created successfully');
    }
    public function edit($id)
    {
        $roles = $this->roleRepository->fetchAll();
        $user = $this->userRepository->find($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $this->userRepository->updateUser($id, $request);
        return redirect('/users')->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return redirect('/users');
    }
}
