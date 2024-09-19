<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create() 
    {
        $organizations = Organization::all();

        return Inertia::render('Auth/Register', [
            'organizations' => $organizations
        ]);
    }

    public function store(Request $request) 
    {
        // sleep(1);
        
        $credentials = $request->validate([
            'role' => ['required'],
            'organization' => ['required', 'string', 'exists:organizations,name'],
            'firstName' => ['required', 'max:255'],
            'lastName' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Activity created successfully!');
    }
}
