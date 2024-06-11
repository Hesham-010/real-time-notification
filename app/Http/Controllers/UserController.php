<?php

namespace App\Http\Controllers;

use App\Events\RegisterEvent;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function register() {
        return view('users.register');
    }

    public function registerAuthenticate(UserRequest $userRequest){
        $user = User::create([
            'name' => $userRequest -> name,
            'email' => $userRequest -> email,
            'password' => Hash::make($userRequest->password),
        ]);

        $admin = User::where('role', 'admin')->first();
        Notification::send($admin, new RegisterNotification($user));

        // event(new RegisterEvent($user));
        return redirect()->route('users.login');
    }

    public function login() {
        return view('users.login');
    }

    public function loginAuthenticate(UserLoginRequest $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return 'Login Success';
        }
        Auth::logout();
        return redirect()->route('login')->with('error', 'Error in Email Or Password.');
    }
}
