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
                'logo' => null
            ],
            [
                'name' => 'AAA',
                'logo' => 'organization_logos/AAA.jpg'
            ],
            [
                'name' => 'BACC',
                'logo' => 'organization_logos/BACC.jpg'
            ],
            [
                'name' => 'BHSPHS',
                'logo' => 'organization_logos/BHSPHS.jpg'
            ],
            [
                'name' => 'CDW',
                'logo' => 'organization_logos/CDW.jpg'
            ],
            [
                'name' => 'CHARMS',
                'logo' => 'organization_logos/CHARMS.jpg'
            ],
            [
                'name' => 'CRYCYC',
                'logo' => 'organization_logos/CRYCYC.jpg'
            ],
            [
                'name' => 'CREATE',
                'logo' => 'organization_logos/CREATE.jpg'
            ],
            [
                'name' => 'ICPEP',
                'logo' => 'organization_logos/ICPEP.jpg'
            ],
            [
                'name' => 'INA',
                'logo' => 'organization_logos/INA.jpg'
            ],
            [
                'name' => 'JPIA',
                'logo' => 'organization_logos/JPIA.jpg'
            ],
            [
                'name' => 'JPPHA',
                'logo' => 'organization_logos/JPPHA.jpg'
            ],
            [
                'name' => 'LEAD',
                'logo' => 'organization_logos/LEAD.jpg'
            ],
            [
                'name' => 'LTSP',
                'logo' => 'organization_logos/LTSP.jpg'
            ],
            [
                'name' => 'MCSA',
                'logo' => 'organization_logos/MCSA.jpg'
            ],
            [
                'name' => 'NSC',
                'logo' => 'organization_logos/NSC.jpg'
            ],
            [
                'name' => 'PICE',
                'logo' => 'organization_logos/PICE.jpg'
            ],
            [
                'name' => 'PIIE',
                'logo' => 'organization_logos/PIIE.jpg'
            ],
            [
                'name' => 'PSYCHSOC',
                'logo' => 'organization_logos/PSYCHSOC.jpg'
            ],
            [
                'name' => 'SSITE',
                'logo' => 'organization_logos/SSITE.jpg'
            ],
            [
                'name' => 'CSC',
                'logo' => 'organization_logos/CSC.jpg'
            ],
            [
                'name' => 'SAO',
                'logo' => 'organization_logos/SAO.jpg'
            ],
        ]);
    }
}
