<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Storage::disk('public')->exists('org-logos')) {
            Storage::disk('public')->makeDirectory('org-logos');
        }

        $organizations = [
            [
                'name' => 'None',
                'logo' => 'UA.png',
                'description' => null,
            ],
            [
                'name' => 'AAA',
                'logo' => 'AAA.jpg',
                'description' => null,
            ],
            [
                'name' => 'BACC',
                'logo' => 'BACC.jpg',
                'description' => null,
            ],
            [
                'name' => 'BHSPHS',
                'logo' => 'BHSPHS.jpg',
                'description' => null,
            ],
            [
                'name' => 'CDW',
                'logo' => 'CDW.jpg',
                'description' => null,
            ],
            [
                'name' => 'CHARMS',
                'logo' => 'CHARMS.jpg',
                'description' => null,
            ],
            [
                'name' => 'CRYCYC',
                'logo' => 'CRYCYC.jpg'
                ,'description' => null,
            ],
            [
                'name' => 'CREATE',
                'logo' => 'CREATE.jpg',
                'description' => null,
            ],
            [
                'name' => 'ICPEP',
                'logo' => 'ICPEP.jpg'
                ,'description' => null,
            ],
            [
                'name' => 'INA',
                'logo' => 'INA.jpg'
                ,'description' => null,
            ],
            [
                'name' => 'JPIA',
                'logo' => 'JPIA.jpg',
                'description' => null,
            ],
            [
                'name' => 'JPPHA',
                'logo' => 'JPPHA.jpg',
                'description' => null,
            ],
            [
                'name' => 'LEAD',
                'logo' => 'LEAD.jpg',
                'description' => null,
            ],
            [
                'name' => 'LTSP',
                'logo' => 'LTSP.jpg',
                'description' => null,
            ],
            [
                'name' => 'MCSA',
                'logo' => 'MCSA.jpg',
                'description' => null,
            ],
            [
                'name' => 'NSC',
                'logo' => 'NSC.jpg',
                'description' => null,
            ],
            [
                'name' => 'PICE',
                'logo' => 'PICE.jpg',
                'description' => null,
            ],
            [
                'name' => 'PIIE',
                'logo' => 'PIIE.png',
                'description' => null,
            ],
            [
                'name' => 'PSYCHSOC',
                'logo' => 'PSYCHSOC.jpg',
                'description' => null,
            ],
            [
                'name' => 'SSITE',
                'logo' => 'SSITE.jpg',
                'description' => null,
            ],
            [
                'name' => 'CSC',
                'logo' => 'UACSC.jpg',
                'description' => null,
            ],
            [
                'name' => 'SAO',
                'logo' => 'UASAO.jpg',
                'description' => null,
            ],
        ];

        foreach ($organizations as $orgData) {
            $logoPath = 'org-logos/' . $orgData['logo'];
            Storage::disk('public')->put($logoPath, file_get_contents(database_path('seeders/logos/' . $orgData['logo'])));

            Organization::create([
                'name' => $orgData['name'],
                'logo' => $logoPath,
                'description' => $orgData['description'],
            ]);
        }

    }
}
