<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use carbon\carbon;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil role dengan nama 'admin', 'user', dan 'interviewer'

        // Membuat data pengguna dengan masing-masing role
        DB::table('users')->insert([

            [
                'name' => 'HR',
                'email' => 'admin@admin.com',
                'password' => Hash::make('pwd123'),
                'role' => 'admin',
                'status_user' => null,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'Cahyono',
                'email' => 'interviewer@interviewer.com',
                'password' => Hash::make('pwd123'),
                'role' => 'interviewer',
                'status_user' => null,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'Gufa',
                'email' => 'interviewer2@interviewer.com',
                'password' => Hash::make('pwd123'),
                'role' => 'interviewer',
                'status_user' => null,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'Kirana',
                'email' => 'interviewer3@interviewer.com',
                'password' => Hash::make('pwd123'),
                'role' => 'interviewer',
                'status_user' => null,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
        ]);
    }
}
