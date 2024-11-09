<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActivityForm;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ActivityFormPDFController extends Controller
{
    public function generatePDF($activityId)
    {
        $activityForms = ActivityForm::with('creator')->where('id', $activityId)
            ->firstOrFail();

        $organizationId = Auth::user()->organization_id;
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
        $osa = User::where('position', 'Office of Student Affairs')->first();
        if ($osa) {
            $osaName = $osa->first_name . ' ' . $osa->last_name;
        }

        // VPAA
        $vpaa = User::where('position', 'Vice President for Academic Affairs')->first();
        if ($vpaa) {
            $vpaaName = $vpaa->first_name . ' ' . $vpaa->last_name;
        }

        // VPA
        $vpa = User::where('position', 'Vice President for Administration')->first();
        if ($vpa) {
            $vpaName = $vpa->first_name . ' ' . $vpa->last_name;
        }

        $data = [
            'activityForms' => $activityForms,
            'collegeDeanName' => $collegeDeanName,
            'osaName' => $osaName,
            'vpaaName' => $vpaaName,
            'vpaName' => $vpaName
        ];

        $pdf = Pdf::loadView('activityForm', $data);
        return $pdf->download('activity-form-' . $activityId . '.pdf');
    }
}
