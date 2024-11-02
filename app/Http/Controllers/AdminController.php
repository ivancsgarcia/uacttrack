<?php

namespace App\Http\Controllers;

use App\Models\ActivityForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function getPending()
    {
        $user = Auth::user();
        if ($user->position == 'College Dean') {
            // $activityForms = ActivityForm::where('college_dean_status', 'PENDING')->get();

            $organizationUserIds = $user->organization->users->pluck('id'); // Get IDs of users in the same organization
            $activityForms = ActivityForm::whereIn('created_by', $organizationUserIds)
                ->where('college_dean_status', 'PENDING')
                ->get();
        } elseif ($user->position == 'OSA') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'PENDING')->get();
        } elseif ($user->position == 'VPAA') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'APPROVED')->where('vpaa_status', 'PENDING')->get();
        } else {
            // Default: show all forms (for admins or higher-level roles)
            $activityForms = ActivityForm::where('status', 'PENDING')->get();
        }

        return Inertia::render('Admin/AdminDashboard', [
            'activityForms' => $activityForms,
            'position' => $user->position
        ]);
    }
    public function getApproved()
    {
        $user = Auth::user();

        if ($user->position == 'College Dean') {
            $approvedForms = ActivityForm::where('college_dean_status', 'APPROVED')->get();
        } elseif ($user->position == 'OSA') {
            $approvedForms = ActivityForm::where('osa_status', 'APPROVED')->get();
        } elseif ($user->position == 'VPAA') {
            $approvedForms = ActivityForm::where('vpaa_status', 'APPROVED')->get();
        } else {
            // Default: show all forms (for admins or higher-level roles)
            $approvedForms = ActivityForm::all();
        }

        // Return Inertia response with the activity forms data
        return Inertia::render('Admin/AdminApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function getRejected()
    {
        $user = Auth::user();

        if ($user->position == 'College Dean') {
            $rejectedForms = ActivityForm::where('college_dean_status', 'REJECTED')->get();
        } elseif ($user->position == 'OSA') {
            $rejectedForms = ActivityForm::where('osa_status', 'REJECTED')->get();
        } elseif ($user->position == 'VPAA') {
            $rejectedForms = ActivityForm::where('vpaa_status', 'REJECTED')->get();
        }

        // Return Inertia response with the activity forms data
        return Inertia::render('Admin/AdminRejectedAPF', [
            'rejectedForms' => $rejectedForms
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();
        $activityForm = ActivityForm::findOrFail($id);

        // Update the status based on the user's role
        switch ($request->position) {
            case 'College Dean':
                $activityForm->college_dean_status = $request->status;
                break;
            case 'OSA':
                $activityForm->osa_status = $request->status;
                break;
            case 'VPAA':
                $activityForm->vpaa_status = $request->status;
                break;
            default:
                return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (
            $activityForm->college_dean_status === 'APPROVED' &&
            $activityForm->osa_status === 'APPROVED' &&
            $activityForm->vpaa_status === 'APPROVED'
        ) {
            // Set the main status to "APPROVED"
            $activityForm->status = 'APPROVED';
        } else if (
            $activityForm->college_dean_status === 'REJECTED' ||
            $activityForm->osa_status === 'REJECTED' ||
            $activityForm->vpaa_status === 'REJECTED'
        ) {
            // Set the main status to "REJECTED"
            $activityForm->status = 'REJECTED';
        }

        $activityForm->save();
        return Inertia::location(url()->previous());
    }

    public function revision()
    {
        return Inertia::render('Admin/AdminRevision');
    }

    public function copyReceiveBy()
    {

        $activityForms = ActivityForm::latest()->paginate(1);

        return Inertia::render('Admin/AdminSendCopy', [
            'activityForms' => $activityForms
        ]);
    }
}
