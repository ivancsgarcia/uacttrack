<?php

namespace App\Http\Controllers;

use App\Models\ActivityForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $activityForms = ActivityForm::latest()->paginate(5);

        return Inertia::render('Admin/AdminDashboard', [
            'activityForms' => $activityForms
        ]);
    }

    public function getPending()
    {
        try {
            $user = Auth::user();
            $activityForms = collect();

            switch ($user->position) {
                case 'College Dean':
                    $organizationUserIds = $user->organization->users->pluck('id');
                    $activityForms = ActivityForm::whereIn('created_by', $organizationUserIds)
                        ->where('college_dean_status', 'PENDING');
                    break;

                case 'Office of Student Affairs':
                    $activityForms = ActivityForm::where('osa_status', 'PENDING');
                    break;

                case 'Vice President for Academic Affairs':
                    $activityForms = ActivityForm::where([
                        ['college_dean_status', 'APPROVED'],
                        ['osa_status', 'APPROVED'],
                        ['vpaa_status', 'PENDING'],
                    ]);
                    break;

                case 'Vice President for Administration':
                    $activityForms = ActivityForm::where([
                        ['college_dean_status', 'APPROVED'],
                        ['osa_status', 'APPROVED'],
                        ['vpaa_status', 'APPROVED'],
                        ['vpa_status', 'PENDING'],
                    ]);
                    break;
            }
            $activityForms = $activityForms->latest()->paginate(5);

            return Inertia::render('Admin/AdminPendingAPF', [
                'activityForms' => $activityForms,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching pending forms: ' . $e->getMessage());

            return Inertia::render('Admin/AdminPendingAPF', [
                'activityForms' => collect([]),
                'error' => 'Failed to fetch pending forms'
            ]);
        }
    }
    public function getApproved()
    {
        try {
            $user = Auth::user();
            $approvedForms = collect();

            switch ($user->position) {
                case 'College Dean':
                    $approvedForms = ActivityForm::where('college_dean_status', 'APPROVED');
                    break;

                case 'Office of Student Affairs':
                    $approvedForms = ActivityForm::where('osa_status', 'APPROVED');
                    break;

                case 'Vice President for Academic Affairs':
                    $approvedForms = ActivityForm::where('vpaa_status', 'APPROVED');
                    break;

                case 'Vice President for Administration':
                    $approvedForms = ActivityForm::where('vpa_status', 'APPROVED');
                    break;
            }

            $approvedForms = $approvedForms->latest()->paginate(5);

            return Inertia::render('Admin/AdminApprovedAPF', [
                'approvedForms' => $approvedForms
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching aprroved forms: ' . $e->getMessage());

            return Inertia::render('Admin/AdminApprovedAPF', [
                'approvedForms' => collect([]),
                'error' => 'Failed to fetch aprroved forms'
            ]);
        }
    }

    public function getRejected()
    {
        try {
            $user = Auth::user();
            $rejectedForms = collect([]);

            switch ($user->position) {
                case 'College Dean':
                    $rejectedForms = ActivityForm::where('college_dean_status', 'REJECTED');
                    break;

                case 'Office of Student Affairs':
                    $rejectedForms = ActivityForm::where('osa_status', 'REJECTED');
                    break;

                case 'Vice President for Academic Affairs':
                    $rejectedForms = ActivityForm::where('vpaa_status', 'REJECTED');
                    break;

                case 'Vice President for Administration':
                    $rejectedForms = ActivityForm::where('vpa_status', 'REJECTED');
                    break;
            }

            $rejectedForms = $rejectedForms->latest()->paginate(5);

            return Inertia::render('Admin/AdminRejectedAPF', [
                'rejectedForms' => $rejectedForms
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching rejected forms: ' . $e->getMessage());

            return Inertia::render('Admin/AdminRejectedAPF', [
                'rejectedForms' => collect([]),
                'error' => 'Failed to fetch rejected forms'
            ]);
        }
    }

    public function updateStatus(Request $request, $id)
{
    $user = Auth::user();
    $activityForm = ActivityForm::findOrFail($id);

    // Validate the incoming request (optional, but good practice)
    $request->validate([
        'status' => 'required|in:PENDING,APPROVED,REJECTED',
        'position' => 'required|string',
    ]);

    // Check if the user has permission to update the status
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
            return Inertia::render('Unauthorized'); // Return Inertia page
    }

    // Check if all statuses are approved or rejected
    if (
        $activityForm->college_dean_status === 'APPROVED' &&
        $activityForm->osa_status === 'APPROVED' &&
        $activityForm->vpaa_status === 'APPROVED' &&
        $activityForm->vpa_status === 'APPROVED'
    ) {
        $activityForm->status = 'APPROVED';
    } elseif (
        $activityForm->college_dean_status === 'REJECTED' ||
        $activityForm->osa_status === 'REJECTED' ||
        $activityForm->vpaa_status === 'REJECTED' ||
        $activityForm->vpa_status === 'REJECTED'
    ) {
        $activityForm->status = 'REJECTED';
    }

    $activityForm->save();

    // Redirect back to the previous page
    return Inertia::location(url()->previous());
}

    public function copyReceiveBy()
    {

        $activityForms = ActivityForm::latest()->paginate(1);

        return Inertia::render('Admin/AdminSendCopy', [
            'activityForms' => $activityForms
        ]);
    }

    public function sendCopy(Request $request, $id) {
        $request->validate([
            'proponent' => 'required|boolean',
            'security' => 'required|boolean',
            'eamo' => 'required|boolean',
            'janitorial' => 'required|boolean',
            'photoLab' => 'required|boolean',
            'sports' => 'required|boolean',
            'ppgs' => 'required|boolean',
            'hotel' => 'required|boolean',
            'soundSystem' => 'required|boolean',
            'others_specify' => 'required|boolean',
        ]);

        $activityForm = ActivityForm::find($id);
        $activityForm->update($request->all());

        return redirect()->route('admin-send-copy')
            ->with('success', 'Activity Form updated successfully.');
    }
}
