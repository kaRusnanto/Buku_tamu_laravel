<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamu')->insert([
            [
                'nama' => 'Fulan', 'gender' => 'Laki-Laki', 'no_hp' => '0857123456', 'alamat' => 'Jakarta',
            ],
            [
                'nama' => 'Fulani', 'gender' => 'Perempuan', 'no_hp' => '0857123453', 'alamat' => 'Palembang',
            ],
            [
                'nama' => 'Fulanan', 'gender' => 'Laki-Laki', 'no_hp' => '0857123455', 'alamat' => 'Lampung',
            ],
        ]);
    }
}
