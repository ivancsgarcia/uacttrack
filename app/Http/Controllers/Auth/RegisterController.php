<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create() 
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request) 
    {
        // sleep(1);
        
        $credentials = $request->validate([
            'role' => ['required', 'max:255'],
            'organization' => ['required', 'max:255'],
            'firstName' => ['required', 'max:255'],
            'lastName' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('home');
    }
}
