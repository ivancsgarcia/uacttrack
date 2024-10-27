<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ActivityForm;
use App\Models\Organization;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function create()
    {
        
        $organizationId = Auth::user()->organization_id;

        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->get();

        // College Dean
        $collegeDean = Organization::where('id', $organizationId)
            ->with('collegeDean')
            ->first()?->collegeDean;

        if ($collegeDean) {
            $collegeDeanName = $collegeDean->first_name . ' ' . $collegeDean->last_name;
        } else {
            $collegeDeanName = 'College Dean not found.';
        }

        // OSA
        $osa = User::where('position', 'OSA')->first();

        if ($osa) {
            $osaName = $osa->first_name . ' ' . $osa->last_name;
        }

        // VPAA
        $vpaa = User::where('position', 'VPAA')->first();

        if ($vpaa) {
            $vpaaName = $vpaa->first_name . ' ' . $vpaa->last_name;
        }

        return Inertia::render('Dashboard', [
            'activityForms' => $activityForms,
            'collegeDeanName' => $collegeDeanName,
            'osaName' => $osaName,
            'vpaaName' => $vpaaName
        ]);
    }
}
