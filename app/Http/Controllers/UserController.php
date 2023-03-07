<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');
        $users = User::with('roles')->paginate(5);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');
        $roles = Role::pluck('title', 'id');
        return view('users.create', compact('roles'));
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');
        $roles = Role::pluck('title', 'id');
        $user->load('roles');
        return view('users.show', compact('user', 'roles'));
    }
    public function edit(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');
        $roles = Role::pluck('title', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index')->with('alterar','Do usuário '. $user->name);
    }
    public function destroy(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'Acesso não permitido!');
        $user->delete();
        return redirect()->route('users.index')->with('excluir.user', ''.$user->name);
    }
}
