<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ActivityForm;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $participants = [
            'Pre-School',
            'Kinder',
            'Grade 1',
            'Grade 2',
            'Grade 3',
            'Grade 4',
            'Grade 5',
            'Grade 6',
            'Grade 7',
            'Grade 8',
            'Grade 9',
            'Grade 10',
            'Grade 11',
            'Grade 12',
            '1st Year College',
            '2nd Year College',
            '3rd Year College',
            '4th Year College',
            'Graduate School',
            'Faculty',
            'Staff',
            'Alumni',
            'Guests',
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
            'participants' => $participants,
            'images' => $imageFiles,
            'approvedForms' => $approvedForms
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'participant' => 'required|string',
            'attendance_count' => 'required|integer|numeric|min:1|max:5000',
            'venue' => 'required|max:255',

            'title' => 'required|string',
            'event_type' => 'required|string',
            'description' => 'required|string',
            'requirements_or_resources_needed' => 'required|string',

            'payment_or_cash_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'food_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'supplies_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'reproduction_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
            'others_file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,xls,xlsx,txt,jpeg|max:3072',
        ]);

        $data['start_date'] = Carbon::parse($request->start_date);
        $data['end_date'] = Carbon::parse($request->end_date);
        $data['created_by'] = Auth::id();

        if ($request->hasFile('payment_or_cash_file')) {
            $data['payment_or_cash_file'] = $request->file('payment_or_cash_file')->store('paymentOrCashFiles', 'public');
        }
        if ($request->hasFile('food_file')) {
            $data['food_file'] = $request->file('food_file')->store('foodFiles', 'public');
        }
        if ($request->hasFile('supplies_file')) {
            $data['supplies_file'] = $request->file('supplies_file')->store('suppliesFiles', 'public');
        }
        if ($request->hasFile('reproduction_file')) {
            $data['reproduction_file'] = $request->file('reproduction_file')->store('reproductionFiles', 'public');
        }
        if ($request->hasFile('others_file')) {
            $data['others_file'] = $request->file('others_file')->store('othersFiles', 'public');
        }

        ActivityForm::create($data);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $activity = ActivityForm::findOrFail($id);
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
        $participants = [
            'Pre-School',
            'Kinder',
            'Grade 1',
            'Grade 2',
            'Grade 3',
            'Grade 4',
            'Grade 5',
            'Grade 6',
            'Grade 7',
            'Grade 8',
            'Grade 9',
            'Grade 10',
            'Grade 11',
            'Grade 12',
            '1st Year College',
            '2nd Year College',
            '3rd Year College',
            '4th Year College',
            'Graduate School',
            'Faculty',
            'Staff',
            'Alumni',
            'Guests',
        ];

        return Inertia::render('ActivityForm/show', [
            'activity' => $activity,
            'venues' => $venues,
            'events' => $events,
            'participants' => $participants,
        ]);
    }

    public function edit($id)
    {
        $activity = ActivityForm::findOrFail($id);
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
        $participants = [
            'Pre-School',
            'Kinder',
            'Grade 1',
            'Grade 2',
            'Grade 3',
            'Grade 4',
            'Grade 5',
            'Grade 6',
            'Grade 7',
            'Grade 8',
            'Grade 9',
            'Grade 10',
            'Grade 11',
            'Grade 12',
            '1st Year College',
            '2nd Year College',
            '3rd Year College',
            '4th Year College',
            'Graduate School',
            'Faculty',
            'Staff',
            'Alumni',
            'Guests',
        ];

        return Inertia::render('ActivityForm/edit', [
            'activity' => $activity,
            'venues' => $venues,
            'events' => $events,
            'participants' => $participants,
        ]);
    }

    public function update(Request $request, $id)
    {
        $activity = ActivityForm::findOrFail($id);

        $data = $request->validate([
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
        ]);

        $data['start_date'] = Carbon::parse($request->start_date);
        $data['end_date'] = Carbon::parse($request->end_date);
        $data['created_by'] = Auth::id();

        if ($request->hasFile('payment_or_cash_file')) {
            if ($activity->payment_or_cash_file) {
                Storage::disk('public')->delete($activity->payment_or_cash_file);
            }

            $data['payment_or_cash_file'] = $request->file('payment_or_cash_file')->store('paymentOrCashFiles', 'public');
        } else {
            $data['payment_or_cash_file'] = $activity->payment_or_cash_file;
        }

        if ($request->hasFile('food_file')) {
            if ($activity->food_file) {
                Storage::disk('public')->delete($activity->food_file);
            }

            $data['food_file'] = $request->file('food_file')->store('foodFiles', 'public');
        } else {
            $data['food_file'] = $activity->food_file;
        }

        if ($request->hasFile('supplies_file')) {
            if ($activity->supplies_file) {
                Storage::disk('public')->delete($activity->supplies_file);
            }

            $data['supplies_file'] = $request->file('supplies_file')->store('suppliesFiles', 'public');
        } else {
            $data['supplies_file'] = $activity->supplies_file;
        }

        if ($request->hasFile('reproduction_file')) {
            if ($activity->reproduction_file) {
                Storage::disk('public')->delete($activity->reproduction_file);
            }

            $data['reproduction_file'] = $request->file('reproduction_file')->store('reproductionFiles', 'public');
        } else {
            $data['reproduction_file'] = $activity->reproduction_file;
        }

        if ($request->hasFile('others_file')) {
            if ($activity->others_file) {
                Storage::disk('public')->delete($activity->others_file);
            }

            $data['others_file'] = $request->file('others_file')->store('othersFiles', 'public');
        } else {
            $data['others_file'] = $activity->others_file;
        }


        $activity->update($data);

        return redirect()->route('activity-form.show', $activity->id)->with('status', 'Activity Form updated successfully');
    }

    public function destroy($id)
    {
        $activity = ActivityForm::findOrFail($id);

        if ($activity->payment_or_cash_file) {
            Storage::disk('public')->delete($activity->payment_or_cash_file);
        }

        if ($activity->food_file) {
            Storage::disk('public')->delete($activity->food_file);
        }

        if ($activity->supplies_file) {
            Storage::disk('public')->delete($activity->supplies_file);
        }

        if ($activity->reproduction_file) {
            Storage::disk('public')->delete($activity->reproduction_file);
        }

        if ($activity->others_file) {
            Storage::disk('public')->delete($activity->others_file);
        }

        $activity->delete();

        return redirect()->route('submitted-apf')->with('status', 'Activity Form deleted successfully');
    }

    public function fetchAll()
    {
        $organizationId = Auth::user()->organization_id;
        $activityForms = ActivityForm::where('status', 'PENDING')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->paginate(5);

        return Inertia::render('SubmittedAPF', [
            'activityForms' => $activityForms
        ]);
    }

    public function fetchApproved()
    {
        $organizationId = Auth::user()->organization_id;

        $approvedForms = ActivityForm::where('status', 'APPROVED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->latest()->paginate(5);

        return Inertia::render('ApprovedAPF', [
            'approvedForms' => $approvedForms
        ]);
    }

    public function fetchRejected()
    {
        $organizationId = Auth::user()->organization_id;

        $rejectedForms = ActivityForm::where('status', 'REJECTED')->whereHas('creator', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })->latest()->paginate(5);

        return Inertia::render('RejectedAPF', [
            'rejectedForms' => $rejectedForms
        ]);
    }

    public function fetchEvents()
    {
        $events = ActivityForm::where('status', 'APPROVED')->get(['title', 'start_date', 'end_date']);

        return response()->json($events);
    }
}
