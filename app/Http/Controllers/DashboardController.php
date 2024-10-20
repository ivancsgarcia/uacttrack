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

        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($org) {
            $query->where('organization', $org);
        })->get();

        // $activityForms = ActivityForm::with(['creator.organization' => function ($query) {
        //     // Optionally filter organizations if needed
        // }])->get();

        // $activityForms = ActivityForm::with(['creator' => function ($query) {
        //     $query->with('organization'); // Load the organization relationship
        // }])
        // ->whereHas('creator', function ($query) use ($org) {
        //     $query->where('organization', $org); // Filter creators based on the organization
        // })
        // ->get();

        return Inertia::render('Dashboard', [
            'activityForms' => $activityForms,
        ]);
    }
}
