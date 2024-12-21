<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VotersLoginSeeder extends Seeder
{
    public function run()
    {
        DB::table('voters_login')->insert([
            [
                'student_id' => '21L-1234',
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'college' => 'Engineering',
            ],
            [
                'student_id' => '21L-1235',
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'college' => 'Science',
            ],
            [
                'student_id' => '21L-1236',
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
                'college' => 'Arts',
            ],
            [
                'student_id' => '21L-1237',
                'name' => 'Bob White',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
                'college' => 'Mathematics',
            ],
            [
                'student_id' => '21L-1238',
                'name' => 'Charlie Black',
                'email' => 'charlie@example.com',
                'password' => Hash::make('password'),
                'college' => 'Physics',
            ],
        ]);
    }
}
