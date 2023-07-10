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
        $adminRole = DB::table('roles')->where('name', 'admin')->first();
        $interviewerRole = DB::table('roles')->where('name', 'interviewer')->first();
        $userRole = DB::table('roles')->where('name', 'user')->first();

        // Membuat data pengguna dengan masing-masing role
        DB::table('users')->insert([

            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('pwd123'),
                'role_id' => $adminRole->id,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'interviewer',
                'email' => 'interviewer@interviewer.com',
                'password' => Hash::make('pwd123'),
                'role_id' => $interviewerRole->id,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('pwd123'),
                'role_id' => $userRole->id,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
        ]);
    }
}
