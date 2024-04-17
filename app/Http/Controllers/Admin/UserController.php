<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return response()->json($users);
    }

    public function store(UserRequest $request)
    {
        if ($request->validated()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $role = Role::where('name', $request->role )->first();

            if ($role) {
                $user->roles()->attach($role);
            } else {
                return response()->json(['error' => 'Role not found'], 404);
            }

        }

        return response()->json(['user' => $user, 'message' => 'User created successfully'], 201);
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $role = Role::where('name', $request->role)->first();
        $user->roles()->sync([$role->id]);

        if ($request->validated()) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);
        }

        return response()->json(['user' => $user, 'message' => 'User updated successfully'], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
