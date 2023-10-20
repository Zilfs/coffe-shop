<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            if(Auth::user()->roles == 'ADMIN')
            {
                return redirect()->route('dashboard-admin');
            }
            if(Auth::user()->roles == 'MANAGER')
            {
                return redirect()->route('dashboard-manager');
            }
            if(Auth::user()->roles == 'EMPLOYEE')
            {
                return redirect()->route('dashboard-employee');
            }
        }
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
