<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function showLoginForm()
    {
        return view('components.login');
    }
    public function showRegister()
    {
        return view('components.register');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ], [
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'password' => 'la contraseña es incorrecta.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('principal');
        } else {

            return redirect()->route('admin.show.login');
        };
    }

    public function validar(Request $request)
    {
        $request->validate([
            'name_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password'
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'Este correo ya existe.'
        ]);

        $user = Admin::create([
            'name_user' => $request->input('name_user'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();
        Auth::login($user);
        return redirect()->route('admin.show.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('layouts.welcome');
    }
}
