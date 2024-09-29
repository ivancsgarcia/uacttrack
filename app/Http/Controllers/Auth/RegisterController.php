<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminCategory;
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
        $admin_categories = AdminCategory::all();

        return Inertia::render('Auth/Register', [
            'organizations' => $organizations,
            'admin_categories' => $admin_categories
        ]);
    }

    public function store(Request $request) 
    {
        
        $credentials = $request->validate([
            'role' => ['required'],
            'organization' => ['string', 'exists:organizations,name', 'nullable'],
            'position' => ['string', 'exists:admin_categories,name', 'nullable'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        // Retrieve the organization name from the request
        // $organizationName = $credentials['organization'];
        // $positionName = $credentials['position'];

        // Fetch the organization using the validated name
        // $organization = Organization::where('name', $organizationName)->firstOrFail();
        // $adminCategory = AdminCategories::where('name', $positionName)->firstOrFail();

        // Create the user and associate with the organization ID
        // $user = User::create(array_merge($credentials, [
        //     'organization_id' => $organization->id, // Add the organization ID here
        //     'position_id' => $adminCategory->id
        // ]));

        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Activity created successfully!');
    }
}
