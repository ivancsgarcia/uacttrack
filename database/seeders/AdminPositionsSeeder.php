<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_positions')->insert([
            ['name' => 'College Dean'],
            ['name' => 'VPAA'],
            ['name' => 'OSA'],
            ['name' => 'Finance Team Leader'],
            ['name' => 'Vice President For Finance'],
            ['name' => 'Vice President For Administration'],
        ]);
    }
}
