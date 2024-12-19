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
            ['kode_gejala' => "P001", 'nama_gejala' => 'Nafsu makan berkurang'],
            ['kode_gejala' => "P002", 'nama_gejala' => 'Nafas sesak / megap-megap'],
            ['kode_gejala' => "P003", 'nama_gejala' => 'Nafas ngorok basah'],
            ['kode_gejala' => "P004", 'nama_gejala' => 'Bersin-bersin'],
            ['kode_gejala' => "P005", 'nama_gejala' => 'Batuk'],
            ['kode_gejala' => "P006", 'nama_gejala' => 'Bulu kusam dan berkerut'],
            ['kode_gejala' => "P007", 'nama_gejala' => 'Diare'],
            ['kode_gejala' => "P008", 'nama_gejala' => 'Produksi telur menurun'],
            ['kode_gejala' => "P009", 'nama_gejala' => 'Kedinginan'],
            ['kode_gejala' => "P010", 'nama_gejala' => 'Tampak lesu'],
            ['kode_gejala' => "P011", 'nama_gejala' => 'Mencret kehijau-hijauan'],
            ['kode_gejala' => "P012", 'nama_gejala' => 'Mencret keputih-putihan'],
            ['kode_gejala' => "P013", 'nama_gejala' => 'Muka pucat'],
            ['kode_gejala' => "P014", 'nama_gejala' => 'Nampak membiru'],
            ['kode_gejala' => "P015", 'nama_gejala' => 'Pembengkakan pial'],
            ['kode_gejala' => "P016", 'nama_gejala' => 'Jengger pucat'],
            ['kode_gejala' => "P017", 'nama_gejala' => 'Kaki dan sayap lumpuh'],
            ['kode_gejala' => "P018", 'nama_gejala' => 'Keluar cairan dari mata dan hidung'],
            ['kode_gejala' => "P019", 'nama_gejala' => 'Kepala bengkak'],
            ['kode_gejala' => "P020", 'nama_gejala' => 'Kepala terputar'],
            ['kode_gejala' => "P021", 'nama_gejala' => 'Pembengkakan dari sinus dan mata'],
            ['kode_gejala' => "P022", 'nama_gejala' => 'Perut membesar'],
            ['kode_gejala' => "P023", 'nama_gejala' => 'Sayap menggantung'],
            ['kode_gejala' => "P024", 'nama_gejala' => 'Terdapat kotoran putih menempel disekitar anus'],
            ['kode_gejala' => "P025", 'nama_gejala' => 'Mati secara mendadak'],
            ['kode_gejala' => "P026", 'nama_gejala' => 'Kerabang telur kasar'],
            ['kode_gejala' => "P027", 'nama_gejala' => 'Putih Telur Encer'],
            ['kode_gejala' => "P028", 'nama_gejala' => 'Kotoran kuning kehijauan'],
            ['kode_gejala' => "P029", 'nama_gejala' => 'Pembengkakan daerah fasial dan sekitar mata'],
            ['kode_gejala' => "P030", 'nama_gejala' => 'Kotoran atau feses berdarah'],
            ['kode_gejala' => "P031", 'nama_gejala' => 'Bergerombol di sudut kandang'],
            ['kode_gejala' => "P032", 'nama_gejala' => 'Mematuk daerah kloaka'],
            ['kode_gejala' => "P033", 'nama_gejala' => 'Kerabang telur pucat'],
            ['kode_gejala' => "P034", 'nama_gejala' => 'Telur lebih kecil'],
            ['kode_gejala' => "P035", 'nama_gejala' => 'Kelumpuhan pada tembolok'],
            ['kode_gejala' => "P036", 'nama_gejala' => 'Bernafas dengan mulut sambil menjulurkan leher'],
            ['kode_gejala' => "P037", 'nama_gejala' => 'Batuk berdarah'],
            ['kode_gejala' => "P038", 'nama_gejala' => 'Tidur paruhnya diletakkan dilantai'],
            ['kode_gejala' => "P039", 'nama_gejala' => 'Duduk dengan sikap membungkuk'],
            ['kode_gejala' => "P040", 'nama_gejala' => 'Kelihatan mengantuk dengan bulu berdiri'],
            ['kode_gejala' => "P041", 'nama_gejala' => 'Badan kurus'],
            ['kode_gejala' => "P042", 'nama_gejala' => 'Terdapat lendir bercampur darah pada rongga mulut'],
            ['kode_gejala' => "P043", 'nama_gejala' => 'Kaki pincang'],
        ]);
    }
}
