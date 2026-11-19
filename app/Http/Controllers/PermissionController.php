<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function change($id) {
        $admin = User::where('id_user', $id)->first();
        $permissions = Permission::all();
        $adminPermissions = UserPermission::where('id_user', $admin->id_user)
            ->get();
        $activePermissions = [];
        foreach ($adminPermissions as $permission) {
            $activePermissions[] = $permission->id_permission;
        }

        return view('panel.permission', [
            'permissions' => $permissions,
            'admin' => $admin,
            'activePermissions' => $activePermissions
        ]);
    }

    public function changePermission(Request $request) {
        $data = $request->all();
        UserPermission::where('id_user', $data['id_user'])
            ->delete();
        foreach ($data['permissions'] as $permission) {
            UserPermission::create([
                'id_user' => $data['id_user'],
                'id_permission' => $permission
            ]);
        }

        return redirect(url()->previous())
            ->with(['msg' => 'Права успешно обновлены']);
    }
}
