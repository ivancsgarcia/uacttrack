<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ActivityForm;

class ActivityFormController extends Controller
{

    public function store(Request $request) 
    {

        $data = $request->validate([
            'paymentOrCash' => ['boolean', 'nullable'],
            'food' => ['boolean', 'nullable'],
            'supplies' => ['boolean', 'nullable'],
            'reproduction' => ['boolean', 'nullable'],
            'date' => ['required', 'date'],
            'fromTime' => ['required', 'max:255'],
            'toTime' => ['required', 'max:255'],
            'numberOfAttendees' => ['required', 'integer', 'numeric'],
            'typeOfEvent' => ['required', 'string'],
            'availableVenue' => ['required', 'max:255'],
            'requirementsOrResourcesNeeded' => ['required', 'string'],
            'activityTitle' => ['required', 'string'],
            'activityDescription' => ['required', 'string'],
            'participant' => ['required', 'string'],
            'paymentOrCashFile' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'foodFile' => ['nullable', 'file','mimes:pdf,jpg,png', 'max:2048'],
            'suppliesFile' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],  
            'reproductionFile' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'othersFile' => ['nullable', 'file', 'mimes:pdf,jpg,png', 'max:2048']
        ]);

        if ($request->hasFile('paymentOrCashFile')) {
            $data['paymentOrCashFile'] = $request->file('paymentOrCashFile')->store('public/paymentOrCashFiles');
        }
        if ($request->hasFile('foodFile')) {
            $data['foodFile'] = $request->file('foodFile')->store('public/foodFiles');
        }
        if ($request->hasFile('suppliesFile')) {
            $data['suppliesFile'] = $request->file('suppliesFile')->store('public/suppliesFiles');
        }
        if ($request->hasFile('reproductionFile')) {
            $data['reproductionFile'] = $request->file('reproductionFile')->store('public/reproductionFiles');
        }
        if ($request->hasFile('othersFile')) {
            $data['othersFile'] = $request->file('othersFile')->store('public/othersFiles');
        }

        ActivityForm::create($data);

        return redirect()->route('home');

    }
}
