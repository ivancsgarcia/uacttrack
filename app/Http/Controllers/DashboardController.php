<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ActivityForm;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function create()
    {
        $activityForms = ActivityForm::where('created_by', Auth::id())->get();

        return Inertia::render('Dashboard', [
            'activityForms' => $activityForms,
        ]);
    }
}
