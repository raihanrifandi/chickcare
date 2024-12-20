<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kondisi')->insert([
            ['kondisi' => "Pasti Ya", 'ket' => ""],
            ['kondisi' => "Hampir Pasti Ya", 'ket' => " "],
            ['kondisi' => "Kemungkinan Besar Ya", 'ket' => " "],
            ['kondisi' => "Mungkin Ya", 'ket' => " "],
            ['kondisi' => "Tidak Tahu", 'ket' => " "],
            ['kondisi' => "Mungkin Tidak", 'ket' => " "],
            ['kondisi' => "Kemungkinan Besar Tidak", 'ket' => " "],
            ['kondisi' => "Hampir Pasti Tidak", 'ket' => " "],
            ['kondisi' => "Pasti Tidak", 'ket' => " "],
        ]);
    }
}
