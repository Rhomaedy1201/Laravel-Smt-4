<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert data ke table detail profile
        DB::table('detail_profile')->insert([
            'address' => 'Bondowoso',
            'no_tlp' => '085345765123',
            'ttl' => '2003-01-15',
            'foto' => 'gambar.jpg'
        ]);
    }
}