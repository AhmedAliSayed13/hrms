<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\User;
use App\Permission;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class RoleController extends Controller
{
    public function addRole()
    {
        $permissions = Permission::all();
        return view('hrms.role.add_role', compact('permissions'));
    }

    Public function processRole(Request $request)
    {
        //Role::create(['name' => $request->name, 'description' => $request->description]);
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;

        $role->save();
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_id) {
                DB::table('role_permissions')->insert([
                    'role_id' => $role->id,
                    'permission_id' => $permission_id
                ]);
            }
        }
        \Session::flash('flash_message', 'Role successfully added!');
        return redirect()->back();

    }

    public function showRole()
    {
        
        $roles = Role::paginate(10);
        return view('hrms.role.show_role', compact('roles'));
    }

    public function showEdit($id)
    {
        $result = Role::whereid($id)->first();
        $permissions = Permission::all();
        $role_permissions= DB::table('role_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
        return view('hrms.role.add_role', compact('result', 'permissions', 'role_permissions'));
    }

    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;

        $edit = Role::findOrFail($id);
        if (!empty($name)) {
            $edit->name = $name;
        }
        if (!empty($description)) {
            $edit->description = $description;
        }
        $edit->save();

        DB::table('role_permissions')->where('role_id', $id)->delete();
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_id) {
                DB::table('role_permissions')->insert([
                    'role_id' => $id,
                    'permission_id' => $permission_id
                ]);
            }
        }
        \Session::flash('flash_message', 'Role successfully updated!');
        return redirect('role-list');
    }

    public function doDelete($id)
    {
        $role = Role::find($id);
        DB::table('role_permissions')->where('role_id', $id)->delete();
        DB::table('user_roles')->where('role_id', $id)->delete();
        $role->delete();
        \Session::flash('flash_message', 'Role successfully Deleted!');
        return redirect('role-list');
    }

}
