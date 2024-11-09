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
            ['name' => 'Vice President for Academic Affairs'],
            ['name' => 'Office of Student Affairs'],
            ['name' => 'Vice President For Administration'],
        ]);
    }
}
