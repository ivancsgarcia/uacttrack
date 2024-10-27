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
            'date' => ['required', 'date'],
            'from_time' => ['required'],
            'to_time' => ['required'],
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

        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');

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

        $org = Auth::user()->organization;

        $activityForms = ActivityForm::whereHas('creator', function ($query) use ($org) {
            $query->where('organization', $org);
        })
            ->where('id', $activityId)
            ->orderBy('created_at', 'desc')
            ->firstOrFail();

        return Inertia::render('ActivityFormPreview', [
            'activityForms' => $activityForms,
        ]);
    }

    public function fetchAll()
    {
        $organizationId = Auth::user()->organization_id;

        $activityForms = ActivityForm::where('status', 'PENDING')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->get();

        return Inertia::render('SubmittedAPF', [
            'activityForms' => $activityForms
        ]);
    }

    public function fetchApproved()
    {
        $organizationId = Auth::user()->organization_id;

        $approvedForms = ActivityForm::where('status', 'APPROVED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->get();

        return Inertia::render('ApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function fetchRejected()
    {
        $organizationId = Auth::user()->organization_id;

        $rejectedForms = ActivityForm::where('status', 'REJECTED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->get();

        return Inertia::render('RejectedAPF', [
            'rejectedForms' => $rejectedForms
        ]);
    }
}
