<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
     $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
         if (Auth::guard('web')->attempt([ 'email' => $request->email, 'password' => $request->password ])) {
             return to_route('dashboard.index');
         } else {
             return back()->withErrors([
                 'email' => 'The entered credentials do not match our records',
             ]);
         }
        }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
