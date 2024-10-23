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
        $admin_positions = AdminPosition::all(['id', 'name']);
        $organization_positions = OrganizationPosition::all(['id', 'name']);

        return Inertia::render('Auth/Register', [
            'organizations' => $organizations,
            'admin_positions' => $admin_positions,
            'organization_positions' => $organization_positions
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'role' => ['required'],
            'organization_id' => ['string', 'exists:organizations,id', 'nullable'],
            'position' => ['string', 'exists:admin_positions,id',  'exists:organization_positions,id || admin_positions,id', 'nullable'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($credentials);

        Auth::login($user);

        // Redirect based on the role of the newly created user
        if ($user->role === 'Admin') {
            // Redirect to Admin Dashboard
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('home')->with('success', 'Activity created successfully!');
    }
}
