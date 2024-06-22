<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function register(){
        return view('auth.register', [
            'title' => 'Registrasi'
        ]);
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('loginError', 'Username atau password salah!!!');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $user = new User();
        // $user->id = intval((microtime(true) * 10000));
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = "employee";
        $user->save();

        $employee = new employee();
        $employee->id = $request->employees_id;
        $employee->user_id = $user->id;
        $employee->nama_karyawan = $request->nama_karyawan;
        $employee->departement = $request->departement;
        $employee->save();


        return redirect('/login')->with('Berhasil registrasi');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
