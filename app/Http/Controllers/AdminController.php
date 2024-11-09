<?php

namespace App\Http\Controllers;

use App\Models\ActivityForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $activityForms = ActivityForm::all();

        return Inertia::render('Admin/AdminDashboard', [
            'activityForms' => $activityForms
        ]);
    }

    public function getPending()
    {
        $user = Auth::user();
        if ($user->position == 'College Dean') {
            $organizationUserIds = $user->organization->users->pluck('id');
            $activityForms = ActivityForm::whereIn('created_by', $organizationUserIds)
                ->where('college_dean_status', 'PENDING')
                ->orderBy('id', 'desc')
                ->get();
        } elseif ($user->position == 'Office of Student Affairs') {
            $activityForms = ActivityForm::where('osa_status', 'PENDING')->orderBy('id', 'desc')
                ->get();
        } elseif ($user->position == 'Vice President for Academic Affairs') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'APPROVED')->where('vpaa_status', 'PENDING')->orderBy('id', 'desc')
                ->get();
        } elseif ($user->position == 'Vice President for Administration') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'APPROVED')->where('vpaa_status', 'APPROVED')->where('vpa_status', 'PENDING')->orderBy('id', 'desc')
                ->get();
        } else {
            // $activityForms = ActivityForm::where('status', 'PENDING')->get();
            $activityForms = null;
        }

        return Inertia::render('Admin/AdminPendingAPF', [
            'activityForms' => $activityForms,
            'position' => $user->position
        ]);
    }
    public function getApproved()
    {
        $user = Auth::user();

        if ($user->position == 'College Dean') {
            $approvedForms = ActivityForm::where('college_dean_status', 'APPROVED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Office of Student Affairs') {
            $approvedForms = ActivityForm::where('osa_status', 'APPROVED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Vice President for Academic Affairs') {
            $approvedForms = ActivityForm::where('vpaa_status', 'APPROVED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Vice President for Administration') {
            $approvedForms = ActivityForm::where('vpa_status', 'APPROVED')->orderBy('id', 'desc')->get();
        } else {
            $approvedForms = null;
        }

        return Inertia::render('Admin/AdminApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function getRejected()
    {
        $user = Auth::user();

        if ($user->position == 'College Dean') {
            $rejectedForms = ActivityForm::where('college_dean_status', 'REJECTED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Office of Student Affairs') {
            $rejectedForms = ActivityForm::where('osa_status', 'REJECTED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Vice President for Academic Affairs') {
            $rejectedForms = ActivityForm::where('vpaa_status', 'REJECTED')->orderBy('id', 'desc')->get();
        } elseif ($user->position == 'Vice President for Administration') {
            $rejectedForms = ActivityForm::where('vpa_status', 'REJECTED')->orderBy('id', 'desc')->get();
        } else {
            $rejectedForms = null;
        }

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
            case 'Office of Student Affairs':
                $activityForm->osa_status = $request->status;
                break;
            case 'Vice President for Academic Affairs':
                $activityForm->vpaa_status = $request->status;
                break;
            case 'Vice President for Administration':
                $activityForm->vpa_status = $request->status;
                break;
            default:
                return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (
            $activityForm->college_dean_status === 'APPROVED' &&
            $activityForm->osa_status === 'APPROVED' &&
            $activityForm->vpaa_status === 'APPROVED' &&
            $activityForm->vpa_status === 'APPROVED'
        ) {
            // Set the main status to "APPROVED"
            $activityForm->status = 'APPROVED';
        } else if (
            $activityForm->college_dean_status === 'REJECTED' ||
            $activityForm->osa_status === 'REJECTED' ||
            $activityForm->vpaa_status === 'REJECTED' ||
            $activityForm->vpa_status === 'REJECTED'
        ) {
            // Set the main status to "REJECTED"
            $activityForm->status = 'REJECTED';
        }

        $activityForm->save();
        return Inertia::location(url()->previous());
    }

    public function copyReceiveBy()
    {

        $activityForms = ActivityForm::latest()->paginate(1);

        return Inertia::render('Admin/AdminSendCopy', [
            'activityForms' => $activityForms
        ]);
    }
}
