<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminCategory;
use App\Models\AdminPosition;
use App\Models\Organization;
use App\Models\OrganizationPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create()
    {
        $organizations = Organization::all(['id', 'name']);

        return Inertia::render('Auth/Register', [
            'organizations' => $organizations,

        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'role' => ['required'],
            'organization_id' => ['exists:organizations,id|nullable'],
            'position' => ['required|string'],
            'first_name' => ['required|max:255'],
            'last_name' => ['required|max:255'],
            'email' => ['required|email|max:255|unique:users,email'],
            'password' => ['required|confirmed|min:8'],
        ]);

        $user = User::create($credentials);

        // Auth::login($user);

        if ($user->role === 'Admin') {
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('register');
    }
}
