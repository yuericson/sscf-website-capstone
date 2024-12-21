<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colleges')->insert([
            ['name' => 'College of Allied and Medicine'],
            ['name' => 'College of Administration, Business, and Accountancy'],
            ['name' => 'College of Teacher Education'],
        ]);
    }
}
