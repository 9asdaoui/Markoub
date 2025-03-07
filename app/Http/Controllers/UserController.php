<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        return view('admin/users/index',["users"=>$users,'roles'=>$roles]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        $user->role_id = $validated['role_id'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'User role updated successfully');
    }

}
