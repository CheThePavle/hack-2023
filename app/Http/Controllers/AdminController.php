<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function admin() {
        return view('panel.admin');
    }

    public function create(Request $request) {
        $data = $request->all();
        $fields = Validator::make($data,[
            'last_name' => 'required|max:255',
            'name' => 'required|max:255',
            'patronymic' => 'required|max:255',
            'phone' => 'required|min:11|max:11|unique:user,phone',
            'email' => 'required|email|max:255|unique:user,email',
            'password' => 'required|min:6|max:255',
        ]);
        if ($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }

        $data['id_role'] = Role::getIdByCode('ADMIN');
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect(route('userList'));
    }

    public function deleteUser($id) {
        $user = User::where('id_user', $id)
            ->first();
        if ($user) {
            $user->delete();
            return redirect(url()->previous());
        }

        return 'Не найден';
    }
}
