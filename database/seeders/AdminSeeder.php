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
                'organization_id' => 20,
                'position' => 'College Dean',
                'first_name' => 'Joey',
                'last_name' => 'Suba',
                'email' => 'dean@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'Office of Student Affairs',
                'first_name' => 'Precious Bernadette',
                'last_name' => 'Estrada',
                'email' => 'osa@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'Vice President for Academic Affairs',
                'first_name' => 'Arnel',
                'last_name' => 'Sicat',
                'email' => 'vpaa@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'Vice President for Administration',
                'first_name' => 'Victor Nicomedes',
                'last_name' => 'Nicdao',
                'email' => 'vpa@email.com',
                'password' => bcrypt('123')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'System Admin',
                'first_name' => 'System',
                'last_name' => 'Admin',
                'email' => 'sysadmin@email.com',
                'password' => bcrypt('123')
            ],
        ],);
    }
}
