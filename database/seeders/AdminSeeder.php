<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'College Dean',
                'first_name' => 'Joey',
                'last_name' => 'Suba',
                'email' => 'dean@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'OSA',
                'first_name' => 'Precious Bernadette',
                'last_name' => 'Estrada',
                'email' => 'osa@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'VPAA',
                'first_name' => 'Arnel',
                'last_name' => 'Sicat',
                'email' => 'vpaa@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'Finance Team Leader',
                'first_name' => 'idk',
                'last_name' => 'idk',
                'email' => 'ftl@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'Vice President For Finance',
                'first_name' => 'Khriselle Anne',
                'last_name' => 'Castillo',
                'email' => 'vpf@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization' => null,
                'position' => 'Vice President For Administration',
                'first_name' => 'Victor Nicomedes',
                'last_name' => 'Nicdao',
                'email' => 'vpa@email.com',
                'password' => bcrypt('123')
            ],
        ],);
    }
}
