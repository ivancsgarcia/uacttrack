<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function create()
    {

        // Step 1: Retrieve the authenticated user
        $user = Auth::user();
        
        // Step 2: Get the organization name from the user
        $orgName = $user->organization;
        
        // Step 3: Query the organizations table to find the logo
        $organization = Organization::where('name', $orgName)->first();

        return Inertia::render('Dashboard', [
            'user' => $user,
            'organization' => $organization,
        ]);
    }
}
