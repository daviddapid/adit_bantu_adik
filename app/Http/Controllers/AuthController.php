<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function login()
    {
        return view('guest.login');
    }

    function register()
    {
        return view('guest.register');
    }

    function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            alert('Sukses', 'Sukses login', 'success');
            return redirect()->route('dashboard');
        }

        alert('Gagal', 'Gagal login, harap masukkan data user yang valid', 'error');
        return back();
    }

    function registerAction(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validated_data['password'] = bcrypt($validated_data['password']);

        User::create($validated_data);

        alert('Register Success', 'Sukses melakukan Registrasi', 'success');

        return redirect()->route('login');
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
