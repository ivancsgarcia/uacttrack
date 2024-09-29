<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('request_forms')->insert([
            [
                'name' => 'Funding Request Form',
                'docs_link' => null,
                'pdf_link' => null,
            ],
            [
                'name' => 'Petty Cash Form',
                'docs_link' => null,
                'pdf_link' => null,
            ],
            [
                'name' => 'Request For Meals Form',
                'docs_link' => null,
                'pdf_link' => null,
            ],
            [
                'name' => 'Requisition Form',
                'docs_link' => null,
                'pdf_link' => null,
            ],
            [
                'name' => 'Purchase Requisition',
                'docs_link' => null,
                'pdf_link' => null,
            ],
            [
                'name' => 'Reproduction Form',
                'docs_link' => null,
                'pdf_link' => null,
            ],
        ]);
    }
}
