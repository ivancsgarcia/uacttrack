<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ActivityForm;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;

class ActivityFormController extends Controller
{

    public function create() 
    {
        $venues = Venue::all();

        return Inertia::render('ActivityForm', [
            'venues' => $venues,
        ]);
    }

    public function store(Request $request) 
    {

        $data = $request->validate([
            'check_payment_or_cash' => ['required', 'boolean'],
            'food' => ['required', 'boolean'],
            'supplies' => ['required', 'boolean'],
            'reproduction' => ['required', 'boolean'],
            'date' => ['required', 'date'],
            'from_time' => ['required', 'max:255'],
            'to_time' => ['required', 'max:255'],
            'attendance_count' => ['required', 'integer', 'numeric'],
            'event_type' => ['required', 'string'],
            'venue' => ['required', 'max:255'],
            'requirements_or_resources_needed' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'participant' => ['required', 'string'],
            'payment_or_cash_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'food_file' => ['nullable', 'file','mimes:pdf,jpg,png', 'max:2048'],
            'supplies_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],  
            'reproduction_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'others_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048']
        ]);

        $data['created_by'] = Auth::id();

        if ($request->hasFile('payment_or_cash_file')) {
            $data['payment_or_cash_file'] = $request->file('payment_or_cash_file')->store('public/paymentOrCashFiles');
        }
        if ($request->hasFile('food_file')) {
            $data['food_file'] = $request->file('food_file')->store('public/foodFiles');
        }
        if ($request->hasFile('supplies_file')) {
            $data['supplies_file'] = $request->file('supplies_file')->store('public/suppliesFiles');
        }
        if ($request->hasFile('reproduction_file')) {
            $data['reproduction_file'] = $request->file('reproduction_file')->store('public/reproductionFiles');
        }
        if ($request->hasFile('others_file')) {
            $data['others_file'] = $request->file('others_file')->store('public/othersFiles');
        }

        ActivityForm::create($data);

        return redirect()->route('home');

    }

    public function fetchAll()
    {
        // Fetch all activity forms from the database
        $activityForms = ActivityForm::where('created_by', Auth::id())->get();

        // Return Inertia response with the activity forms data
        return Inertia::render('SubmittedAPF', [
            'activityForms' => $activityForms
        ]);
    }

    public function fetchApproved()
    {
        $approvedForms = ActivityForm::where('created_by', Auth::id())->where('status', 'approved')->get();

        return Inertia::render('ApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function fetchRejected()
    {
        $rejectedForms = ActivityForm::where('created_by', Auth::id())->where('status', 'rejected')->get();
        return Inertia::render('RejectedAPF', [
            'rejectedForms' => $rejectedForms
        ]);
    }

    public function fetchPendingAdmin()
    {
        $user = Auth::user();
        if ($user->position == 'College Dean') {
            $activityForms = ActivityForm::where('college_dean_status', 'PENDING')->get();
        } elseif ($user->position == 'OSA') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'PENDING')->get();
        } elseif ($user->position == 'VPAA') {
            $activityForms = ActivityForm::where('college_dean_status', 'APPROVED')->where('osa_status', 'APPROVED')->where('vpaa_status', 'PENDING')->get();
        } 

        return Inertia::render('Admin/AdminDashboard', [
            'activityForms' => $activityForms,
            'position' => $user->position
        ]);
    }
    public function fetchApprovedAdmin()
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

    public function fetchRejectedAdmin()
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
        } else if(
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
}
