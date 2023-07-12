<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use carbon\carbon;

class Lowongan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongans')->insert([
            [
                'judul' => 'Lowongan Pekerjaan 1',
                'deskripsi' => 'Deskripsi lowongan pekerjaan 1.',
                'posisi' => 'Posisi 1',
                'file_test' => 'file1.pdf',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'judul' => 'Lowongan Pekerjaan 2',
                'deskripsi' => 'Deskripsi lowongan pekerjaan 2.',
                'posisi' => 'Posisi 2',
                'file_test' => 'file2.pdf',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'judul' => 'Lowongan Pekerjaan 3',
                'deskripsi' => 'Deskripsi lowongan pekerjaan 2.',
                'posisi' => 'Posisi 3',
                'file_test' => 'file3.pdf',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
        ]);
    }
}
