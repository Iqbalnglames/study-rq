<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
        else
        {
            return view('auth.index');
        }
    }

    public function loginAction(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($data))
        {
            return redirect('dashboard');
        }
        else
        {
            return redirect('/login')->with('error','Username atau Password salah')->withInput();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
