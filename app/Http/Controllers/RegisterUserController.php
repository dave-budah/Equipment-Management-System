<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Inflector\Rules\French\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:3', 'string'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:6', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        auth()->login($user);
        return to_route('dashboard.index');
    }
}
