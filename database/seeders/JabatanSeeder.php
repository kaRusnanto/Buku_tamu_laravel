<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            [
                'nama' => 'Karyawan',  
            ],
            [
                'nama' => 'Manager',
            ],
            [
                'nama' => 'Bos Manager',
            ],
        ]);   
    }
}
