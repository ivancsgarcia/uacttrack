<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RequestFormController extends Controller
{
    public function create()
    {

        $requestForms = RequestForm::all()->map(function ($form) {
            return [
                'id' => $form->id,
                'name' => $form->name,
                'docx_url' => Storage::url($form->docs_link),
                'xlsx_url' => Storage::url($form->xlsx_link),
            ];
        })->sortBy('name')
            ->values();

        return Inertia::render('RequestForm', [
            'requestForms' => $requestForms
        ]);
    }
}
