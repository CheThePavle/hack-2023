<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register() {
        if (Auth::check()) return redirect(route('lk'));
        return view('register');
    }

    public function login() {
        if (Auth::check()) return redirect(route('lk'));
        return view('login');
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

        if ($request->get('org')) {
            $data['id_role'] = Role::getIdByCode('ORGANIZER');
        } else {
            $data['id_role'] = Role::getIdByCode('USER');
        };

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect(route('login'))
            ->with(['msg' => 'Успешная регистрация']);
    }

    public function auth(Request $request) {
        $data = $request->all();
        $fields = Validator::make($data,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }

        $user = User::getByEmail($data['email']);
        if (!Hash::check($data['password'], $user?->password)) {
            return redirect(url()->previous())
                ->withErrors(['error' => 'Неверный email или пароль'])
                ->withInput();
        }

        Auth::login($user);

        if (Auth::user()->checkOrganizer()) return redirect(route('lkOrganizer'));
        if (Auth::user()->checkAdmin() || Auth::user()->checkOperator()) return redirect(route('admin'));
        return redirect(route('lk'));
    }

    public function logout() {
//        return Auth::user()->permissions();
        if (Auth::check()) Auth::logout();
        return redirect(route('login'));
    }

    public function userAdmin() {
        return view('panel.user.addAdmin');
    }

    public function userList() {
        $users = User::with('role')->get();
        return view('panel.user.list', [
            'users' => $users
        ]);
    }
}
