<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityFormController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->validate([
            'paymentOrCash' => ['required', 'max:255'],
            'food' => ['required', 'max:255'],
            'supplies' => ['required', 'max:255'],
            'reproduction' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'fromTime' => ['required', 'max:255'],
            'toTime' => ['required', 'max:255'],
            'numberOfAttendees' => ['required', 'max:255'],
            'typeOfEvent' => ['required', 'max:255'],
            'availableVenue' => ['required', 'max:255'],
            'requirementsOrResourcesNeeded' => ['required', 'max:255'],
            'activityTitle' => ['required', 'max:255'],
            'activityDescription' => ['required', 'max:255'],
            'participant' => ['required', 'max:255'],
        ]);
    }
}
