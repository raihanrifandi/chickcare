<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gejala')->insert([
            ['kode_gejala' => 1, 'nama_gejala' => 'Nafsu makan berkurang'],
            ['kode_gejala' => 2, 'nama_gejala' => 'Nafas sesak / megap-megap'],
            ['kode_gejala' => 3, 'nama_gejala' => 'Nafas ngorok basah'],
            ['kode_gejala' => 4, 'nama_gejala' => 'Bersin-bersin'],
            ['kode_gejala' => 5, 'nama_gejala' => 'Batuk'],
            ['kode_gejala' => 33, 'nama_gejala' => 'Kerabang telur pucat'],
            ['kode_gejala' => 6, 'nama_gejala' => 'Bulu kusam dan berkerut'],
            ['kode_gejala' => 7, 'nama_gejala' => 'Diare'],
            ['kode_gejala' => 8, 'nama_gejala' => 'Produksi telur menurun'],
            ['kode_gejala' => 9, 'nama_gejala' => 'Kedinginan'],
            ['kode_gejala' => 10, 'nama_gejala' => 'Tampak lesu'],
            ['kode_gejala' => 11, 'nama_gejala' => 'Mencret kehijau-hijauan'],
            ['kode_gejala' => 12, 'nama_gejala' => 'Mencret keputih-putihan'],
            ['kode_gejala' => 13, 'nama_gejala' => 'Muka pucat'],
            ['kode_gejala' => 14, 'nama_gejala' => 'Nampak membiru'],
            ['kode_gejala' => 15, 'nama_gejala' => 'Pembengkakan pial'],
            ['kode_gejala' => 16, 'nama_gejala' => 'Jengger pucat'],
            ['kode_gejala' => 17, 'nama_gejala' => 'Kaki dan sayap lumpuh'],
            ['kode_gejala' => 18, 'nama_gejala' => 'Keluar cairan dari mata dan hidung'],
            ['kode_gejala' => 19, 'nama_gejala' => 'Kepala bengkak'],
            ['kode_gejala' => 20, 'nama_gejala' => 'Kepala terputar'],
            ['kode_gejala' => 21, 'nama_gejala' => 'Pembengkakan dari sinus dan mata'],
            ['kode_gejala' => 22, 'nama_gejala' => 'Perut membesar'],
            ['kode_gejala' => 23, 'nama_gejala' => 'Sayap menggantung'],
            ['kode_gejala' => 24, 'nama_gejala' => 'Terdapat kotoran putih menempel disekitar anus'],
            ['kode_gejala' => 25, 'nama_gejala' => 'Mati secara mendadak'],
            ['kode_gejala' => 26, 'nama_gejala' => 'Kerabang telur kasar'],
            ['kode_gejala' => 27, 'nama_gejala' => 'Putih Telur Encer'],
            ['kode_gejala' => 28, 'nama_gejala' => 'Kotoran kuning kehijauan'],
            ['kode_gejala' => 29, 'nama_gejala' => 'Pembengkakan daerah fasial dan sekitar mata'],
            ['kode_gejala' => 30, 'nama_gejala' => 'Kotoran atau feses berdarah'],
            ['kode_gejala' => 31, 'nama_gejala' => 'Bergerombol di sudut kandang'],
            ['kode_gejala' => 32, 'nama_gejala' => 'Mematuk daerah kloaka'],
            ['kode_gejala' => 34, 'nama_gejala' => 'Telur lebih kecil'],
            ['kode_gejala' => 35, 'nama_gejala' => 'Kelumpuhan pada tembolok'],
            ['kode_gejala' => 36, 'nama_gejala' => 'Bernafas dengan mulut sambil menjulurkan leher'],
            ['kode_gejala' => 37, 'nama_gejala' => 'Batuk berdarah'],
            ['kode_gejala' => 38, 'nama_gejala' => 'Tidur paruhnya diletakkan dilantai'],
            ['kode_gejala' => 39, 'nama_gejala' => 'Duduk dengan sikap membungkuk'],
            ['kode_gejala' => 40, 'nama_gejala' => 'Kelihatan mengantuk dengan bulu berdiri'],
            ['kode_gejala' => 41, 'nama_gejala' => 'Badan kurus'],
            ['kode_gejala' => 42, 'nama_gejala' => 'Terdapat lendir bercampur darah pada rongga mulut'],
            ['kode_gejala' => 43, 'nama_gejala' => 'Kaki pincang'],
        ]);
    }
}
