<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all organization IDs
        $organizations = DB::table('organizations')->pluck('id', 'name');

        // Define the positions that each organization should have
        $positions = ['President', 'Vice President', 'Secretary', 'Representative'];

        // Loop through each organization and insert each position
        $data = [];
        foreach ($organizations as $organizationId) {
            foreach ($positions as $position) {
                $data[] = [
                    'name' => $position,
                    'organization_id' => $organizationId,
                ];
            }
        }

        // Insert all positions into organization_positions table
        DB::table('organization_positions')->insert($data);

        // DB::table('organization_positions')->insert([
        //     ['name' => 'President',],
        //     ['name' => 'Vice President'],
        //     ['name' => 'Secretary'],
        //     ['name' => 'Representative'],
        // ]);
    }
}
