<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;

class UserRoleController extends Controller
{
    public function manageRoles()
    {
        $users = User::all();
        $roles = Role::all();
        return view('profile.edit', compact('users', 'roles'));
    }
    
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->assignRole($role->name);

        return redirect()->back()->with('status', 'role-assigned');
    }
    
    public function showAssignRoleView(): View
    {
        $users = User::all();
        $roles = Role::all();
        return view('Assign-role', compact('users', 'roles'));
      
    }
}

