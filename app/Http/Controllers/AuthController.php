<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir al usuario a su página de inicio
            return redirect()->intended('/home');
        }

        // Si la autenticación falla, redirigir al usuario de vuelta al formulario de login
        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no son válidas.',
        ]);
    }

}
