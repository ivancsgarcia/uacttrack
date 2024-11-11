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
        $approvedForms = ActivityForm::where('status', 'APPROVED')->get();
        $venues = Venue::orderBy('name')->get();

        $events = [
            'Seminar',
            'Meeting',
            'Workshop',
            'Symposium',
            'Conference',
            'Orientation',
            'Training',
            'Forum',
            'Webinar',
            'Others'
        ];

        $imageFiles = [];
        $directoryPath = public_path('images/ua-events');
        if (is_dir($directoryPath)) {
            foreach (scandir($directoryPath) as $file) {
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
                    $imageFiles[] = [
                        'itemImageSrc' => asset("images/ua-events/{$file}"),
                        'thumbnailImageSrc' => asset("images/ua-events/{$file}"),
                        'alt' => pathinfo($file, PATHINFO_FILENAME),
                    ];
                }
            }
        }

        return Inertia::render('ActivityForm/index', [
            'venues' => $venues,
            'events' => $events,
            'images' => $imageFiles,
            'approvedForms' => $approvedForms
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'check_payment_or_cash' => 'required|boolean',
            'food' => 'required|boolean',
            'supplies' => 'required|boolean',
            'reproduction' => 'required|boolean',
            'others' => 'required|boolean',

            'date' => 'required|date',
            'from_time' => 'required|date',
            'to_time' => 'required|date',
            'attendance_count' => 'required|integer|numeric|min:1|max:5000',
            'event_type' => 'required|string',
            'venue' => 'required|max:255',
            'requirements_or_resources_needed' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'participant' => 'required|string',

            'payment_or_cash_file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'food_file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'supplies_file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'reproduction_file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'others_file' => 'nullable|file|mimes:pdf,jpg,png|max:2048'
        ]);

        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');
        $data['from_time'] = Carbon::parse($request->from_time)->format('h:i');
        $data['to_time'] = Carbon::parse($request->to_time)->format('h:i');

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
        $activityForms = ActivityForm::where('id', $activityId)
            ->firstOrFail();
        $venues = Venue::orderBy('name')->get();


        return Inertia::render('ActivityForm/show', [
            'activityForms' => $activityForms,
            'logoPath' => asset('images/sys-logos/ua-logo.png'),
            'venues' => $venues
        ]);
    }

    public function edit($activityId)
    {
        $activityForms = ActivityForm::where('id', $activityId)
            ->firstOrFail();

        $venues = Venue::orderBy('name')->get();

        $events = [
            'Seminar',
            'Meeting',
            'Workshop',
            'Symposium',
            'Conference',
            'Orientation',
            'Training',
            'Forum',
            'Webinar',
            'Others'
        ];

        return Inertia::render('ActivityForm/edit', [
            'activityForms' => $activityForms,
            'venues' => $venues,
            'events' => $events,
            'logoPath' => asset('images/sys-logos/ua-logo.png')
        ]);
    }

    public function fetchAll()
    {
        $organizationId = Auth::user()->organization_id;

        $activityForms = ActivityForm::where('status', 'PENDING')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->latest()
            ->paginate(5);

        return Inertia::render('SubmittedAPF', [
            'activityForms' => $activityForms
        ]);
    }

    public function fetchApproved()
    {
        $organizationId = Auth::user()->organization_id;

        $approvedForms = ActivityForm::where('status', 'APPROVED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->latest()
            ->paginate(5);

        return Inertia::render('ApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function fetchRejected()
    {
        $organizationId = Auth::user()->organization_id;

        $rejectedForms = ActivityForm::where('status', 'REJECTED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->latest()
            ->paginate(5);

        return Inertia::render('RejectedAPF', [
            'rejectedForms' => $rejectedForms
        ]);
    }
}
