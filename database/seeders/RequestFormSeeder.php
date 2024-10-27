<?php

namespace Database\Seeders;

use App\Models\RequestForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        $requestForms = [
            [
                'name' => 'Funding Request Form',
                'docs_link' => null,
                'xlsx_link' => 'Funding_Request_Form.xls',
            ],
            [
                'name' => 'Petty Cash Form',
                'docs_link' => null,
                'xlsx_link' => 'Petty_Cash_Form.xlsx',
            ],
            [
                'name' => 'Request For Meals Form',
                'docs_link' => null,
                'xlsx_link' => 'Request_for_Meals.xlsx',
            ],
            [
                'name' => 'Requisition Form',
                'docs_link' => null,
                'xlsx_link' => null,
            ],
            [
                'name' => 'Purchase Requisition',
                'docs_link' => 'Purchase_Requisition_Form.doc',
                'xlsx_link' => null,
            ],
            [
                'name' => 'Reproduction Form',
                'docs_link' => 'Reproduction_Form.doc',
                'xlsx_link' => null,
            ],
        ];

        foreach ($requestForms as $form) {
            $docxFormsPath = 'request-forms/' . $form['docs_link'];
            Storage::disk('public')->put($docxFormsPath, file_get_contents(database_path('seeders/request-forms/' . $form['docs_link'])));

            $xlsxFormsPath = 'request-forms/' . $form['xlsx_link'];
            Storage::disk('public')->put($xlsxFormsPath, file_get_contents(database_path('seeders/request-forms/' . $form['xlsx_link'])));

            RequestForm::create([
                'name' => $form['name'],
                'docs_link' => $docxFormsPath,
                'xlsx_link' => $xlsxFormsPath,
            ]);
        }
    }
}
