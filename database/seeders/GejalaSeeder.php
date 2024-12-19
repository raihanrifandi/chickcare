<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gejala')->insert([
            ['kode_gejala' => "G001", 'nama_gejala' => 'Nafsu makan berkurang'],
            ['kode_gejala' => "G002", 'nama_gejala' => 'Nafas sesak / megap-megap'],
            ['kode_gejala' => "G003", 'nama_gejala' => 'Nafas ngorok basah'],
            ['kode_gejala' => "G004", 'nama_gejala' => 'Bersin-bersin'],
            ['kode_gejala' => "G005", 'nama_gejala' => 'Batuk'],
            ['kode_gejala' => "G006", 'nama_gejala' => 'Bulu kusam dan berkerut'],
            ['kode_gejala' => "G007", 'nama_gejala' => 'Diare'],
            ['kode_gejala' => "G008", 'nama_gejala' => 'Produksi telur menurun'],
            ['kode_gejala' => "G009", 'nama_gejala' => 'Kedinginan'],
            ['kode_gejala' => "G010", 'nama_gejala' => 'Tampak lesu'],
            ['kode_gejala' => "G011", 'nama_gejala' => 'Mencret kehijau-hijauan'],
            ['kode_gejala' => "G012", 'nama_gejala' => 'Mencret keputih-putihan'],
            ['kode_gejala' => "G013", 'nama_gejala' => 'Muka pucat'],
            ['kode_gejala' => "G014", 'nama_gejala' => 'Nampak membiru'],
            ['kode_gejala' => "G015", 'nama_gejala' => 'Pembengkakan pial'],
            ['kode_gejala' => "G016", 'nama_gejala' => 'Jengger pucat'],
            ['kode_gejala' => "G017", 'nama_gejala' => 'Kaki dan sayap lumpuh'],
            ['kode_gejala' => "G018", 'nama_gejala' => 'Keluar cairan dari mata dan hidung'],
            ['kode_gejala' => "G019", 'nama_gejala' => 'Kepala bengkak'],
            ['kode_gejala' => "G020", 'nama_gejala' => 'Kepala terputar'],
            ['kode_gejala' => "G021", 'nama_gejala' => 'Pembengkakan dari sinus dan mata'],
            ['kode_gejala' => "G022", 'nama_gejala' => 'Perut membesar'],
            ['kode_gejala' => "G023", 'nama_gejala' => 'Sayap menggantung'],
            ['kode_gejala' => "G024", 'nama_gejala' => 'Terdapat kotoran putih menempel disekitar anus'],
            ['kode_gejala' => "G025", 'nama_gejala' => 'Mati secara mendadak'],
            ['kode_gejala' => "G026", 'nama_gejala' => 'Kerabang telur kasar'],
            ['kode_gejala' => "G027", 'nama_gejala' => 'Putih Telur Encer'],
            ['kode_gejala' => "G028", 'nama_gejala' => 'Kotoran kuning kehijauan'],
            ['kode_gejala' => "G029", 'nama_gejala' => 'Pembengkakan daerah fasial dan sekitar mata'],
            ['kode_gejala' => "G030", 'nama_gejala' => 'Kotoran atau feses berdarah'],
            ['kode_gejala' => "G031", 'nama_gejala' => 'Bergerombol di sudut kandang'],
            ['kode_gejala' => "G032", 'nama_gejala' => 'Mematuk daerah kloaka'],
            ['kode_gejala' => "G033", 'nama_gejala' => 'Kerabang telur pucat'],
            ['kode_gejala' => "G034", 'nama_gejala' => 'Telur lebih kecil'],
            ['kode_gejala' => "G035", 'nama_gejala' => 'Kelumpuhan pada tembolok'],
            ['kode_gejala' => "G036", 'nama_gejala' => 'Bernafas dengan mulut sambil menjulurkan leher'],
            ['kode_gejala' => "G037", 'nama_gejala' => 'Batuk berdarah'],
            ['kode_gejala' => "G038", 'nama_gejala' => 'Tidur paruhnya diletakkan dilantai'],
            ['kode_gejala' => "G039", 'nama_gejala' => 'Duduk dengan sikap membungkuk'],
            ['kode_gejala' => "G040", 'nama_gejala' => 'Kelihatan mengantuk dengan bulu berdiri'],
            ['kode_gejala' => "G041", 'nama_gejala' => 'Badan kurus'],
            ['kode_gejala' => "G042", 'nama_gejala' => 'Terdapat lendir bercampur darah pada rongga mulut'],
            ['kode_gejala' => "G043", 'nama_gejala' => 'Kaki pincang'],
        ]);
    }
}
