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
                'logo' => 'organization_logos/AAA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'BACC',
                'logo' => 'organization_logos/BACC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'BHSPHS',
                'logo' => 'organization_logos/BHSPHS.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CDW',
                'logo' => 'organization_logos/CDW.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CHARMS',
                'logo' => 'organization_logos/CHARMS.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CRYCYC',
                'logo' => 'organization_logos/CRYCYC.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'CREATE',
                'logo' => 'organization_logos/CREATE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'ICPEP',
                'logo' => 'organization_logos/ICPEP.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'INA',
                'logo' => 'organization_logos/INA.jpg'
                ,'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'JPIA',
                'logo' => 'organization_logos/JPIA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'JPPHA',
                'logo' => 'organization_logos/JPPHA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'LEAD',
                'logo' => 'organization_logos/LEAD.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'LTSP',
                'logo' => 'organization_logos/LTSP.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'MCSA',
                'logo' => 'organization_logos/MCSA.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'NSC',
                'logo' => 'organization_logos/NSC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PICE',
                'logo' => 'organization_logos/PICE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PIIE',
                'logo' => 'organization_logos/PIIE.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'PSYCHSOC',
                'logo' => 'organization_logos/PSYCHSOC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'SSITE',
                'logo' => 'organization_logos/SSITE.jpg',
                'description' => null,
                'adviser_first_name' => 'Joey',
                'adviser_last_name' => 'Suba'
            ],
            [
                'name' => 'CSC',
                'logo' => 'organization_logos/CSC.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
            [
                'name' => 'SAO',
                'logo' => 'organization_logos/SAO.jpg',
                'description' => null,
                'adviser_first_name' => null,
                'adviser_last_name' => null,
            ],
        ]);
    }
}
