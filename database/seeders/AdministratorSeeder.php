<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrator;
use App\Models\Comelec;
use App\Models\Tabulator; // Make sure this model exists
use App\Models\Tabulation; 
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Super Administrator
        Administrator::updateOrCreate(
            ['email' => 'Superadmin@gmail.com'], // Match by email
            [
                'name' => 'Super Admin',
                'password' => Hash::make('sscf1SLSU!'),
                'role' => 'superadmin',
            ]
        );

        // Seed Regular Administrator
        Administrator::updateOrCreate(
            ['email' => 'Admin@gmail.com'], // Match by email
            [
                'name' => 'Admin',
                'password' => Hash::make('sscf!SLSU1'),
                'role' => 'admin',
            ]
        );

        // Seed COMELEC User
        Comelec::updateOrCreate(
            ['email' => 'Comelec@gmail.com'], // Match by email
            [
                'name' => 'Comelec',
                'password' => Hash::make('comelec!SSCF@'),
                'role' => 'comelec', // Add role for COMELEC
            ]
        );

        // Seed Tabulator User
        Tabulator::updateOrCreate(
            ['email' => 'Tabulator@gmail.com'],
            [
                'name' => 'Tabulator',
                'password' => Hash::make('sscf1SLSU1'),
                'role' => 'tabulator',
            ]
        );
         // Seed Tabulator User
         Tabulation::updateOrCreate(
            ['email' => 'Tabulation@gmail.com'],
            [
                'name' => 'Tabulation',
                'password' => Hash::make('sscf1SLSU1'),
                'role' => 'admin',
            ]
        );
    }
}
