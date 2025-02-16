<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Показывает страницу авторизации
     * 
     * @params 
     * 
     * @return view('login')
     */
    public function loginPage()
    {
        return view('login');
    }

    /**
     * Логика авторизации
     * 
     * @param Request $request
     * 
     * @return response
     */
    public function loginUser(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                "success" => true
            ]);
        }

        return back()->withErrors([
            'email' => 'Неверный логин или пароль.',
        ]);

    }
}
