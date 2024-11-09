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
                'capacity' => 100
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
                'capacity' => 500
            ],
            [
                'name' => 'Swimming Pool',
                'capacity' => null
            ],
            [
                'name' => 'Social Hall',
                'capacity' => 100
            ],
            [
                'name' => 'Multi-Purpose Room',
                'capacity' => 300
            ],
            [
                'name' => 'Gymnasium',
                'capacity' => 4000
            ],
            [
                'name' => 'Auditorium',
                'capacity' => 540
            ],
            [
                'name' => 'St. Thomas Aquinas Courtyard',
                'capacity' => 3000
            ],
            [
                'name' => 'Covered Court 1',
                'capacity' => 800
            ],
            [
                'name' => 'Covered Court 2',
                'capacity' => 800
            ],
            [
                'name' => 'Cinense Library',
                'capacity' => null
            ],
            [
                'name' => 'Classroom',
                'capacity' => null
            ],

        ]);
    }
}
