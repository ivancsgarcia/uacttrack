<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ExternalLinks extends Controller
{
    public function create()
    {

        return Inertia::render('ExternalLinks');
    }
}
