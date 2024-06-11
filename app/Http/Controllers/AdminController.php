<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function authenticate(AdminLoginRequest $request) {
         $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            }
            Auth::logout();
            return redirect()->route('login')->with('error', 'You are not authorized to access the admin dashboard.');
        }
        return redirect()->route('login')->with('error', 'Error in Email Or Password.');
    }
}
