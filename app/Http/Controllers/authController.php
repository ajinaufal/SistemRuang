<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function indexRegister()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'verify' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nim' => 'required|max:8',
            'tahun' => 'required|max:4',
            'name' => 'required',
            'nomorhp' => 'required|max:13',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:10',
        ]);

        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'tahun' => $request->tahun,
            'prodi' => $request->prodi,
            'level' => 'User',
            'status'=> 'Mahasiswa',
            'email' => $request->email,
            'nomorhp' => $request->nomorhp,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
