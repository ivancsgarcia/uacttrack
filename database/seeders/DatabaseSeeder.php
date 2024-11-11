<?php

namespace Database\Seeders;

use App\Models\ActivityForm;
use App\Models\User;
use Database\Factories\ActivityFormFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => '123456'
        // ]);




        $this->call([
            OrganizationSeeder::class,
            VenueSeeder::class,
            // AdminPositionsSeeder::class,
            RequestFormSeeder::class,
            // OrganizationPositionSeeder::class,
            AdminSeeder::class,
            StudentOfficerSeeder::class,
        ]);

        // User::factory(2)->create();
        // ActivityForm::factory(20)->create();
    }
}
