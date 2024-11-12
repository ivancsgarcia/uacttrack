<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function download($file)
    {
        // Locate the file in storage (e.g., public or s3)
        $filePath = 'files/' . $file; // Adjust path based on your storage structure

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }

        // Return an error if the file is not found
        return response()->json(['error' => 'File not found.'], Response::HTTP_NOT_FOUND);
    }
}
