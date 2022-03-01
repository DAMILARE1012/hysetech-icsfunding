<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdministrationController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.sections.administration.users', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'users',
            'users' => $users
        ]);
    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.sections.administration.create-user', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'users',
            'roles' => $roles
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.administration')->with('success', 'User created');
    }


    public function permissions()
    {
        return view('admin.sections.administration.permissions', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'permissions'
        ]);
    }


    public function roles()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.sections.administration.roles', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'roles',
            'roles' => $roles
        ]);
    }

    public function createRole()
    {
        $permissions = Permission::all();
        return view('admin.sections.administration.create-role', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'roles',
            'permissions' => $permissions
        ]);

    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:roles,title',
            'description' => 'required',
            'permissions' => 'required',
        ], [
            'title.required' => 'required*',
            'description.required' => 'required*',
            'permissions.required' => 'Please select at least one permission',
        ]);
        $role = new Role();
        $role->title = $request->title;
        $role->description = $request->description;
        $role->save();
        $role->permissions()->attach($request->permissions);
        return redirect(route('admin.administration.roles'))->with('success', 'Role created successfully');
    }

    public function editRole(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('permission_id')->all();
        return view('admin.sections.administration.edit-role', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'roles',
            'permissions' => $permissions,
            'role' => $role,
            'role_permissions' => $rolePermissions
        ]);
    }

    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'title' => ['required', Rule::unique('roles', 'title')->ignore($role->id)],
            'description' => 'required',
            'permissions' => 'required',
        ], [
            'title.required' => 'required*',
            'description.required' => 'required*',
            'permissions.required' => 'Please select at least one permission',
        ]);
        $role->title = $request->title;
        $role->description = $request->description;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect(route('admin.administration.roles'))->with('success', 'Role created successfully');
    }
}
