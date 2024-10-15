<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ActivityForm;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function create()
    {
        $org = Auth::user()->organization;

        // Assuming ActivityForm has a user relationship
        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($org) {
            $query->where('organization', $org);
        })->get();
        // $activityForms = ActivityForm::where('created_by', Auth::id())->get();

        return Inertia::render('Dashboard', [
            'activityForms' => $activityForms,
        ]);
    }
}
