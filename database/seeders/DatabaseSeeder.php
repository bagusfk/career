<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use carbon\carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'interviewer',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'name' => 'user',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
        ]);
    }
}
