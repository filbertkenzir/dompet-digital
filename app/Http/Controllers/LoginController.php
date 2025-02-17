<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        return view('auth/login');
    }

    public function loginAction (Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ])->validate();

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $request->session()->regenerate();

        if(Auth::attempt($login)) {
            if(Auth::User()->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::User()->role == 'user') {
                return redirect()->route('user.index');
            } elseif (Auth::User()->role == 'bank') {
                return redirect()->route('bank.index');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

}
