<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;

class StudentOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => 'Student Officer',
                'organization_id' => 20,
                'position' => 'Representative',
                'first_name' => 'Ivan Christopher',
                'last_name' => 'Garcia',
                'email' => 'ivan@email.com',
                'password' => bcrypt('123'), 
            ]
        ]);
    }
}
