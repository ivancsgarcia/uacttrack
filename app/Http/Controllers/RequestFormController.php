<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestFormController extends Controller
{
    public function create() {

        return Inertia::render('RequestForm');
        
    }
}
