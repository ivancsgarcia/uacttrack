<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ActivityForm;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'date' => ['required', 'date'], //'date_format:Y/m/d'
            'from_time' => ['required'], //'date_format:H:i:s'
            'to_time' => ['required'], //'date_format:H:i:s'
            'attendance_count' => ['required', 'integer', 'numeric'],
            'event_type' => ['required', 'string'],
            'venue' => ['required', 'max:255'],
            'requirements_or_resources_needed' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'participant' => ['required', 'string'],
            'payment_or_cash_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'food_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'supplies_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'reproduction_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'others_file' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048']
        ]);

        // $data['date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $data['date'])->format('m-d-Y');
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');
        // $data['from_time'] = Carbon::parse($request->from_time)->format('H:i:s');
        // $data['to_time'] = Carbon::parse($request->to_time)->format('H:i:s');

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

    public function show($activityId)
    {

        // Get the organization of the authenticated user
        $org = Auth::user()->organization;

        // Retrieve the activity form based on creator's organization and activity ID
        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($org) {
            $query->where('organization', $org);
        })
            ->where('id', $activityId) // Filter by activity ID
            ->orderBy('created_at', 'desc') // Apply orderBy on the main query
            ->firstOrFail();

        return Inertia::render('ActivityFormPreview', [
            'activityForms' => $activityForms,
        ]);
    }

    public function fetchAll()
    {

        $org = Auth::user()->organization;

        // Assuming ActivityForm has a user relationship
        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($org) {
            $query->where('organization', $org)->orderBy('created_at', 'desc');
        })->get();

        // Fetch all activity forms from the database
        // $activityForms = ActivityForm::where('created_by', Auth::id())->get();

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
}
