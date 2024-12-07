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
                'organization_id' => 1,
                'position' => 'Office of Student Affairs',
                'first_name' => 'Precious Bernadette',
                'last_name' => 'Estrada',
                'email' => 'OSA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'Vice President for Academic Affairs',
                'first_name' => 'Arnel',
                'last_name' => 'Sicat',
                'email' => 'VPAA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'Vice President for Administration',
                'first_name' => 'Victor Nicomedes',
                'last_name' => 'Nicdao',
                'email' => 'VPA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 1,
                'position' => 'System Admin',
                'first_name' => 'System',
                'last_name' => 'Admin',
                'email' => 'SYSADMIN@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 2,
                'position' => 'College Dean',
                'first_name' => 'AAA',
                'last_name' => 'AAA',
                'email' => 'AAA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 3,
                'position' => 'College Dean',
                'first_name' => 'BACC',
                'last_name' => 'BACC',
                'email' => 'BACC@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 4,
                'position' => 'College Dean',
                'first_name' => 'BHSPHS',
                'last_name' => 'BHSPHS',
                'email' => 'BHSPHS@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 5,
                'position' => 'College Dean',
                'first_name' => 'CDW',
                'last_name' => 'CDW',
                'email' => 'CDW@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 6,
                'position' => 'College Dean',
                'first_name' => 'CHARMS',
                'last_name' => 'CHARMS',
                'email' => 'CHARMS@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 7,
                'position' => 'College Dean',
                'first_name' => 'CRYCYC',
                'last_name' => 'CRYCYC',
                'email' => 'CRYCYC@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 8,
                'position' => 'College Dean',
                'first_name' => 'CREATE',
                'last_name' => 'CREATE',
                'email' => 'CREATE@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 9,
                'position' => 'College Dean',
                'first_name' => 'ICPEP',
                'last_name' => 'ICPEP',
                'email' => 'ICPEP@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 10,
                'position' => 'College Dean',
                'first_name' => 'INA',
                'last_name' => 'INA',
                'email' => 'INA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 11,
                'position' => 'College Dean',
                'first_name' => 'JPIA',
                'last_name' => 'JPIA',
                'email' => 'JPIA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 12,
                'position' => 'College Dean',
                'first_name' => 'JPPHA',
                'last_name' => 'JPPHA',
                'email' => 'JPPHA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 13,
                'position' => 'College Dean',
                'first_name' => 'LEAD',
                'last_name' => 'LEAD',
                'email' => 'LEAD@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 14,
                'position' => 'College Dean',
                'first_name' => 'LTSP',
                'last_name' => 'LTSP',
                'email' => 'LTSP@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 15,
                'position' => 'College Dean',
                'first_name' => 'MCSA',
                'last_name' => 'MCSA',
                'email' => 'MCSA@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 16,
                'position' => 'College Dean',
                'first_name' => 'NSC',
                'last_name' => 'NSC',
                'email' => 'NSC@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 17,
                'position' => 'College Dean',
                'first_name' => 'PICE',
                'last_name' => 'PICE',
                'email' => 'PICE@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 18,
                'position' => 'College Dean',
                'first_name' => 'PIIE',
                'last_name' => 'PIIE',
                'email' => 'PIIE@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 19,
                'position' => 'College Dean',
                'first_name' => 'PSYCHSOC',
                'last_name' => 'PSYCHSOC',
                'email' => 'PSYCHSOC@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 20,
                'position' => 'College Dean',
                'first_name' => 'Joey',
                'last_name' => 'Suba',
                'email' => 'SSITE@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 21,
                'position' => 'College Dean',
                'first_name' => 'CSC',
                'last_name' => 'CSC',
                'email' => 'CSC@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
            [
                'role' => 'Admin',
                'organization_id' => 22,
                'position' => 'College Dean',
                'first_name' => 'SAO',
                'last_name' => 'SAO',
                'email' => 'SAO@ua.edu.ph',
                'password' => bcrypt('12345678')
            ],
        ],);
    }
}
