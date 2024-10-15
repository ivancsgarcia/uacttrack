<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizations')->insert([
            [
                'name' => 'None',
                'logo' => null,
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'AAA',
                'logo' => 'org-logos/AAA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'BACC',
                'logo' => 'org-logos/BACC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'BHSPHS',
                'logo' => 'org-logos/BHSPHS.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CDW',
                'logo' => 'org-logos/CDW.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CHARMS',
                'logo' => 'org-logos/CHARMS.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CRYCYC',
                'logo' => 'org-logos/CRYCYC.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CREATE',
                'logo' => 'org-logos/CREATE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'ICPEP',
                'logo' => 'org-logos/ICPEP.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'INA',
                'logo' => 'org-logos/INA.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'JPIA',
                'logo' => 'org-logos/JPIA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'JPPHA',
                'logo' => 'org-logos/JPPHA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'LEAD',
                'logo' => 'org-logos/LEAD.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'LTSP',
                'logo' => 'org-logos/LTSP.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'MCSA',
                'logo' => 'org-logos/MCSA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'NSC',
                'logo' => 'org-logos/NSC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PICE',
                'logo' => 'org-logos/PICE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PIIE',
                'logo' => 'org-logos/PIIE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PSYCHSOC',
                'logo' => 'org-logos/PSYCHSOC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'SSITE',
                'logo' => 'org-logos/SSITE.jpg',
                'description' => null,
                'adviser_first_name' => 'Joey',
                'adviser_last_name' => 'Suba'
            ],
            [
                'name' => 'CSC',
                'logo' => 'org-logos/CSC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'SAO',
                'logo' => 'org-logos/SAO.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
        ]);
    }
}
