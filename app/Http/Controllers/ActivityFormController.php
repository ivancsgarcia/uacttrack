<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ActivityForm;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Storage;

class ActivityFormController extends Controller
{

    public function create()
    {
        $approvedForms = ActivityForm::where('status', 'APPROVED')->get();
        $venues = Venue::orderBy('capacity')->get();

        $events = [
            'Seminar/Workshop',
            'Academic Competition',
            'Research Presentations',
            'Game Tournaments',
            'Sports Festivals',
            'Fun Runs/Walkathons',
            'Esports Competitions',
            'Outdoor Adventures',
            'Cultural Festival',
            'Talent Show',
            'Art Exhibitions',
            'Film Screening and Discussion',
            'Theater Performances',
            'Outreach Programs',
            'Fundraising Events',
            'School Anniversary/Foundation Day',
            'Recognition Ceremonies',
            'Welcome and Farewell Parties',
            'Alumni Homecoming',
            'Job Fairs',
            'Internship and Career Placement Workshops',
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

            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'attendance_count' => 'required|integer|numeric|min:1|max:5000',
            'event_type' => 'required|string',
            'venue' => 'required|max:255',
            'requirements_or_resources_needed' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'participant' => 'required|string',

            'payment_or_cash_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'food_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'supplies_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'reproduction_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'others_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',

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

        $data['start_date'] = Carbon::parse($request->start_date);
        $data['end_date'] = Carbon::parse($request->end_date);

        $data['created_by'] = Auth::id();

        if ($request->hasFile('payment_or_cash_file')) {
            $data['food_file'] = $request->file('food_file')->store('paymentOrCashFiles', 'public');
        }
        if ($request->hasFile('food_file')) {
            $data['food_file'] = $request->file('food_file')->store('foodFiles', 'public');
        }
        if ($request->hasFile('supplies_file')) {
            $data['food_file'] = $request->file('food_file')->store('suppliesFiles', 'public');
        }
        if ($request->hasFile('reproduction_file')) {
            $data['food_file'] = $request->file('food_file')->store('reproductionFiles', 'public');
        }
        if ($request->hasFile('others_file')) {
            $data['food_file'] = $request->file('food_file')->store('othersFiles', 'public');
        }

        ActivityForm::create($data);

        return redirect()->route('home');
    }

    public function show($activityId)
    {
        $activityForms = ActivityForm::where('id', $activityId)
            ->firstOrFail();

        return Inertia::render('ActivityForm/show', [
            'activityForms' => $activityForms,
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

    public function fetchEvents() {
        $events = ActivityForm::where('status', 'APPROVED')->get(['title', 'start_date', 'end_date']);

        return response()->json($events);
    }
}
