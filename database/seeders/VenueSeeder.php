<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venues')->insert([
            [
                'name' => 'UA Hotel',
                'capacity' => null
            ],
            [
                'name' => 'UA Conference Room',
                'capacity' => null
            ],
            [
                'name' => 'UA Cafe Maria',
                'capacity' => null
            ],
            [
                'name' => 'UA Facade',
                'capacity' => null
            ],
            [
                'name' => 'UA Chapel',
                'capacity' => null
            ],
            [
                'name' => 'Swimming Pool',
                'capacity' => null
            ],
            [
                'name' => 'Social Hall',
                'capacity' => null
            ],
            [
                'name' => 'Multi-Purpose Room',
                'capacity' => null
            ],
            [
                'name' => 'Gymnasium',
                'capacity' => null
            ],
            [
                'name' => 'Auditorium',
                'capacity' => null
            ],
            [
                'name' => 'St. Thomas Aquinas Courtyard',
                'capacity' => null
            ],
            [
                'name' => 'Covered Court 1',
                'capacity' => null
            ],
            [
                'name' => 'Covered Court 2',
                'capacity' => null
            ],

        ]);
    }
}
