<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Buku_TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     
            DB::table('buku_tamu')->insert(
            [
                [
                    'tgl_bertemu' => '24 Maret 2004', 
                    'keperluan' => 'bertemu', 
                    'tamu_id' => 1, 
                    'jabatan_id' => 1
                ],
                [
                    'tgl_bertemu' => '27 Maret 2004', 
                    'keperluan' => 'Bisnis', 
                    'tamu_id' => 2, 
                    'jabatan_id' => 2
                ],  
                [
                    'tgl_bertemu' => '29 Maret 2004', 
                    'keperluan' => 'Partisipasi', 
                    'tamu_id' => 3, 
                    'jabatan_id' => 3
                ],   
            ]);
            
    }
}
