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
        DB::table('organization_positions')->insert([
            ['name' => 'President'],
            ['name' => 'Vice President'],
            ['name' => 'Secretary'],
            ['name' => 'Representative'],
        ]);
    }
}
