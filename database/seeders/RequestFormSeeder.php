<?php

namespace Database\Seeders;

use App\Models\RequestForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RequestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Storage::disk('public')->exists('request-forms')) {
            Storage::disk('public')->makeDirectory('request-forms');
        }

        $files = File::files(database_path('seeders/request-forms'));

        foreach ($files as $file) {

            $targetPath = 'request-forms/' . $file->getFilename();
            Storage::disk('public')->put($targetPath, File::get($file));
        }

        DB::table('request_forms')->insert([
            [
                'name' => 'Funding Request Form',
                'docs_link' => '',
                'xlsx_link' => 'request-forms/Funding_Request_Form.xls',
            ],
            [
                'name' => 'Petty Cash Form',
                'docs_link' => '',
                'xlsx_link' => 'request-forms/Petty_Cash_Form.xlsx',
            ],
            [
                'name' => 'Request For Meals Form',
                'docs_link' => '',
                'xlsx_link' => 'request-forms/Request_for_Meals.xlsx',
            ],
            [
                'name' => 'Requisition Form',
                'docs_link' => '',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Purchase Requisition',
                'docs_link' => 'request-forms/Purchase_Requisition_Form.doc',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Reproduction Form',
                'docs_link' => 'request-forms/Reproduction_Form.doc',
                'xlsx_link' => '',
            ],

        ]);
    }
}
