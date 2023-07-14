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
                'judul' => 'Software Engineer',
                'deskripsi' => 'Merancang dan mengembangkan perangkat lunak, memecahkan masalah teknis, melakukan pengujian dan pemeliharaan sistem.',
                'posisi' => 'Software Engineer',
                'file_test' => '',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'judul' => 'Marketing Specialist',
                'deskripsi' => 'Membangun strategi pemasaran, mengelola kampanye iklan, melacak dan menganalisis data pasar, mengelola media sosial, dan melaksanakan kegiatan pemasaran lainnya.',
                'posisi' => 'Marketing Specialist',
                'file_test' => '',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
            [
                'judul' => 'Graphic Designer',
                'deskripsi' => 'Mendesain dan mengembangkan materi pemasaran seperti brosur, poster, dan banner, menghasilkan grafik berkualitas tinggi, mengikuti tren desain terkini, dan berkolaborasi dengan tim pemasaran.',
                'posisi' => 'Graphic Designer',
                'file_test' => '',
                'tgl_open' => '2023-07-01',
                'tgl_closed' => '2023-07-15',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
            ],
        ]);
    }
}
