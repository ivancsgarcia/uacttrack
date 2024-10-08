<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestFormController extends Controller
{
    public function create() {

        $request_forms = RequestForm::all();

        return Inertia::render('RequestForm', [
            'request_forms' => $request_forms
        ]);
        
    }
}
