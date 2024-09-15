<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityFormController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->validate([
            'paymentOrCash' => ['max:255'],
            'food' => ['max:255'],
            'supplies' => ['max:255'],
            'reproduction' => ['max:255'],
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
            'paymentOrCashFile' => ['file', 'max:255'],
            'foodFile' => ['file','max:255'],
            'suppliesFile' => ['file', 'max:255'],  
            'reproductionFile' => ['file', 'max:255'],
            'othersFile' => ['file', 'max:255']
        ]);
    }
}
