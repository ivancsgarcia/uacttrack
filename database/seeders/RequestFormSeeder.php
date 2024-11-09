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
            [
                'name' => 'Acknowledgement Receipt',
                'docs_link' => 'request-forms/Acknowledgement_Receipt.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Activity Proposal Form',
                'docs_link' => 'request-forms/Activity_Proposal_Form.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Cash Advance Liquidation Form',
                'docs_link' => 'request-forms/Cash_Advance_Liquidation_Form.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Certificate of Completion',
                'docs_link' => 'request-forms/Certificate_of_Completion.doc',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Certificate Template',
                'docs_link' => 'request-forms/Certificate_Template.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Employee Leave Authority',
                'docs_link' => '',
                'xlsx_link' => 'request-forms/Employee_Leave_Authority.xlsx',
            ],
            [
                'name' => 'Parent Consent Slip',
                'docs_link' => 'request-forms/Parent_Consent_Slip.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'SD Form 1',
                'docs_link' => 'request-forms/SD_Form_1.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Service Requisition Form',
                'docs_link' => 'request-forms/Service_Requisition_Form.doc',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Supplies and Maintenance Request Form',
                'docs_link' => 'request-forms/Supplies_and_Maintenance_Request_Form.docx',
                'xlsx_link' => '',
            ],
            [
                'name' => 'Travel Authorization Slip',
                'docs_link' => '',
                'xlsx_link' => 'request-forms/Travel_Authorization_Slip.xlsx',
            ],

        ]);
    }
}
