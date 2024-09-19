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
                'logo' => 'public/organization_logos/AAA.jpg'
            ],
            [
                'name' => 'BACC',
                'logo' => 'public/organization_logos/BACC.jpg'
            ],
            [
                'name' => 'BHSPHS',
                'logo' => 'public/organization_logos/BHSPHS.jpg'
            ],
            [
                'name' => 'CDW',
                'logo' => 'public/organization_logos/CDW.jpg'
            ],
            [
                'name' => 'CHARMS',
                'logo' => 'public/organization_logos/CHARMS.jpg'
            ],
            [
                'name' => 'CRYCYC',
                'logo' => 'public/organization_logos/CRYCYC.jpg'
            ],
            [
                'name' => 'CREATE',
                'logo' => 'public/organization_logos/CREATE.jpg'
            ],
            [
                'name' => 'ICPEP',
                'logo' => 'public/organization_logos/ICPEP.jpg'
            ],
            [
                'name' => 'INA',
                'logo' => 'public/organization_logos/INA.jpg'
            ],
            [
                'name' => 'JPIA',
                'logo' => 'public/organization_logos/JPIA.jpg'
            ],
            [
                'name' => 'JPPHA',
                'logo' => 'public/organization_logos/JPPHA.jpg'
            ],
            [
                'name' => 'LEAD',
                'logo' => 'public/organization_logos/LEAD.jpg'
            ],
            [
                'name' => 'LTSP',
                'logo' => 'public/organization_logos/LTSP.jpg'
            ],
            [
                'name' => 'MCSA',
                'logo' => 'public/organization_logos/MCSA.jpg'
            ],
            [
                'name' => 'NSC',
                'logo' => 'public/organization_logos/NSC.jpg'
            ],
            [
                'name' => 'PICE',
                'logo' => 'public/organization_logos/PICE.jpg'
            ],
            [
                'name' => 'PIIE',
                'logo' => 'public/organization_logos/PIIE.jpg'
            ],
            [
                'name' => 'PSYCHSOC',
                'logo' => 'public/organization_logos/PSYCHSOC.jpg'
            ],
            [
                'name' => 'SSITE',
                'logo' => 'public/organization_logos/SSITE.jpg'
            ],
            [
                'name' => 'CSC',
                'logo' => 'public/organization_logos/CSC.jpg'
            ],
            [
                'name' => 'SAO',
                'logo' => 'public/organization_logos/SAO.jpg'
            ],
        ]);
    }
}
