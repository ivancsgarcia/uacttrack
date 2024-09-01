<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        sleep(1);

        // Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        // Register
        $user = User::create($fields);

        // Login
        // Auth::login($user);

        // Redirect
        return redirect()->route('home');

        // dd($request);
    }
}
