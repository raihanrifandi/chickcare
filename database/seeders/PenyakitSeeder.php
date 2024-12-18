<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penyakit')->insert([
            [
                'kode_penyakit' => 1,
                'nama_penyakit' => 'Berak Kapur (Pullorum Disease)',
                'detail_penyakit' => 'Pullorum Disease disebut juga Bacillary White Diarrhea dan yang lebih popular disebut penyakit berak kapur atau berak putih.',
                'solusi_penyakit' => 'Berikan Master Coliprim dosis: 1 gr/1 ltr air selama 3-4 hari (1/2 hari) berturut-turut. setelah itu berikan Master Vit-Stress selama 3-4 hari untuk membantu proses penyembuhan.',
                'gambar_penyakit' => '01BerakKapur.jpg',
            ],
            [
                'kode_penyakit' => 2,
                'nama_penyakit' => 'Kolera Ayam (Fowl Cholera)',
                'detail_penyakit' => 'Penyakit Fowl Cholera merupakan penyakit ayam yang dapat menyerang secara pelan-pelan dan juga dapat menyerang secara mendadak.',
                'solusi_penyakit' => 'Berikan Master Kolericid dosis: 1 gr/1 ltr air selama 3-4 hari berturut-turut. berikan Master Vit-Stress dosis: 1 gr/3 ltr air untuk membantu proses penyembuhan.',
                'gambar_penyakit' => '02KoleraAyam.jpg',
            ],
            [
                'kode_penyakit' => 3,
                'nama_penyakit' => 'Flu Burung (Avian Influenza)',
                'detail_penyakit' => 'Penyakit Avian Influenza, disebut juga penyakit Fowl Plaque. Pertama kali terjadi di Italia sekitar tahun 1800. Selanjutnya menyebar luas sampai tahun 1930, setelah itu menjadi sporadis dan terlokalisasi terutama di timur tengah.',
                'solusi_penyakit' => 'Tidak ada obat. Dianjurkan untuk disingkirkan dan dimusnakan dengan cara dibakar dan bangkainya dikubur.',
                'gambar_penyakit' => '03FluBurung.jpg',
            ],
            [
                'kode_penyakit' => 4,
                'nama_penyakit' => 'Tetelo (Newcastle Disease)',
                'detail_penyakit' => 'Penyakit Newcastle Disease disebut juga Pseudovogel pest Rhaniket, Pheumoencephalitis, Tortor Furrens, dan di Indonesia popular dengan sebutan tetelo. Penyakit ini pertama kali ditemukan oleh Doyle pada tahun 1927, didaerah Newcastle on Tyne, Inggris',
                'solusi_penyakit' => 'Vaksinasi harus dilakukan untuk memperoleh kekebalan. Jenis vaksin yang kami gunakan adalah ND Lasota yang kami beli dari PT. SHS. Vaksinasi ND yang pertama, kami lakukan dengan cara pemberian melalui tetes mata pada hari ke 2. Untuk berikutnya pemberian vaksin kami lakukan dengan cara suntikan di intramuskuler otot dada.',
                'gambar_penyakit' => '04Tetelo.jpg',
            ],
            [
                'kode_penyakit' => 5,
                'nama_penyakit' => 'Tipus Ayam (Fowl Typhoid)',
                'detail_penyakit' => 'Penyakit Fowl Typhoid dikenal sebagai penyakit tipus ayam, tergolong penyakit menular.',
                'solusi_penyakit' => 'Berikan Neo Terramycin dosis: 2 sendok teh/3,8 ltr air selama 3-4 hari berturut-turut.',
                'gambar_penyakit' => '05Tipus Ayam.jpg',
            ],
            [
                'kode_penyakit' => 6,
                'nama_penyakit' => 'Berak Darah (Coccidosis)',
                'detail_penyakit' => 'Coccidosis merupakan penyakit menular yang ganas, dikalangan para peternak ayam disebut juga penyakit berak darah. Penyakit ini ditemukan pada tahun 1674.',
                'solusi_penyakit' => 'Berikan Master Coliprim dosis: 1gr/1 ltr air selama 3-4 hari (1/2 hari) berturut-turut. setelah pengobatan berikan Vitamin Master Vit-Stress dosis: 1gr/3 ltr selama 3-4 hari berturut-turut.',
                'gambar_penyakit' => '06Berak Darah.jpg',
            ],
            [
                'kode_penyakit' => 7,
                'nama_penyakit' => 'Gumboro (Infectious Bursal Disease)',
                'detail_penyakit' => 'Penyakit Gumboro, disebut juga Infectious Bursal Disease. Pertama kali ditemukan dan dilaporkan pada tahun 1975 oleh Dr. Csgrove di daerah Gumboro, Deleware, Amerika Serikat.',
                'solusi_penyakit' => 'Tidak ada obat. Air gula 30-50 gr/ltr air dan ditambah Master Vit-Stress dosis: 1 gr/2 ltr air untuk meningkatkan kondisi tubuh.',
                'gambar_penyakit' => '07Gumboro.jpg',
            ],
            [
                'kode_penyakit' => 8,
                'nama_penyakit' => 'Salesma Ayam (Infectious Coryza)',
                'detail_penyakit' => 'Penyakit Infectious Coryza disebut juga Infectious Cold, Snot, Rhinitis, Roup atau yang populer disebut salesma ayam.',
                'solusi_penyakit' => 'Berikan Master Cyprosyn-Plus dosis: 1 gr/1 ltr air selama 3-4 hari berturut-turut. selama pengobatan berikan vitamin Master Vit-Stress dosis: 1 gr/3 ltr air untuk membantu proses pengobatan.',
                'gambar_penyakit' => '08Snot.jpg',
            ],
            [
                'kode_penyakit' => 9,
                'nama_penyakit' => 'Batuk Ayam Menahun (Infectious Bronchitis)',
                'detail_penyakit' => 'Penyakit Infectious Bronchitis pertama kali ditemukan pada tahun 1930 dan penyakit ini mulai menjadi wabah sejak tahun 1940. Pada tahun 1950 penyakit Infectious Bronchitis sudah dapat dikendalikan dengan efektif.',
                'solusi_penyakit' => 'Tidak ada obat. Berikan vitamin Master Vit-Stress dosis: 1 gr/1 ltr air untuk memperbaiki kondisi tubuh.',
                'gambar_penyakit' => '09IB.jpg',
            ],
            [
                'kode_penyakit' => 10,
                'nama_penyakit' => 'Busung Ayam (Lymphoid Leukosis)',
                'detail_penyakit' => 'Penyakit Lymphoid Leukosis termasuk kelompok Leukosis Komplex Disease. Penyakit ini banyak menyerang ayam di Indonesia.',
                'solusi_penyakit' => 'Tidak ada obat. Segera disingkirkan atau dimusnakan.',
                'gambar_penyakit' => '10BusungAyam.jpg',
            ],
            [
                'kode_penyakit' => 11,
                'nama_penyakit' => 'Batuk Darah (Infectious Laryngo Tracheitis)',
                'detail_penyakit' => 'Penyakit Infectious Laryngotracheitis disebut juga Infectious Tracheitis. Jenis penyakit ini ditemukan pada tahun 1925, dan secara resmi diakui oleh Committee on Poultry Disease of the American Veterinary Medical Association, pada tahun 1931.',
                'solusi_penyakit' => 'Tidak ada obat. Berikan vitamin Master Vit-Stress dosis: 1 gr/1 ltr air untuk membantu memperbaiki kondisi tubuh.',
                'gambar_penyakit' => '11Batuk Darah.png',
            ],
            [
                'kode_penyakit' => 12,
                'nama_penyakit' => 'Mareks (Mareks Disease)',
                'detail_penyakit' => 'Penyakit Mareks Disease pada awalnya dimasukan dalam kelompok Leukosis Complex Disease. Namun setelah ditemukan penyebabnya dan penanggulangannya, penyakit ini dipisahkan dari kelompok Leukosis Complex Disease.',
                'solusi_penyakit' => 'Tidak ada obat. Dianjurkan untuk disingkirkan dan dimusnakan dengan cara dibakar dan bangkainya dikubur.',
                'gambar_penyakit' => '12 Marek.jpg',
            ],
            [
                'kode_penyakit' => 13,
                'nama_penyakit' => 'Produksi Telur (Egg Drop Syndrome 76/EDS 76)',
                'detail_penyakit' => 'Penyakit Egg Drop Syndrome, merupakan penyakit ayam yang pada tahu 1976, dilaporkan van Eck di Nederland. Dikalangan pakar kesehatan ternak, penyakit itu disebut Egg Drop Syndrome 76.',
                'solusi_penyakit' => 'Tidak ada obat. Berikan vitamin untuk membantu kondisi tubuh.',
                'gambar_penyakit' => '13EDS.jpg',
            ],
        ]);
    }
}
