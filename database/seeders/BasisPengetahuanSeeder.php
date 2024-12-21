<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasisPengetahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rules = [
            // Berak Kapur (Pullorum Disease)
            ['id' => 'R1', 'kode_penyakit' => 'P001', 'kode_gejala' => 'G012', 'cf' => 0.8],
            ['id' => 'R2', 'kode_penyakit' => 'P001', 'kode_gejala' => 'G023', 'cf' => 0.4],
            ['id' => 'R3', 'kode_penyakit' => 'P001', 'kode_gejala' => 'G024', 'cf' => 1.0],

            // Kolera Ayam (Fowl Cholera)
            ['id' => 'R4', 'kode_penyakit' => 'P002', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R5', 'kode_penyakit' => 'P002', 'kode_gejala' => 'G003', 'cf' => 0.8],
            ['id' => 'R6', 'kode_penyakit' => 'P002', 'kode_gejala' => 'G015', 'cf' => 1.0],
            ['id' => 'R7', 'kode_penyakit' => 'P002', 'kode_gejala' => 'G021', 'cf' => 1.0],

            // Flu Burung (Avian Influenza)
            ['id' => 'R8', 'kode_penyakit' => 'P003', 'kode_gejala' => 'G013', 'cf' => 0.4],
            ['id' => 'R9', 'kode_penyakit' => 'P003', 'kode_gejala' => 'G014', 'cf' => 1.0],
            ['id' => 'R10', 'kode_penyakit' => 'P003', 'kode_gejala' => 'G019', 'cf' => 0.4],
            ['id' => 'R11', 'kode_penyakit' => 'P003', 'kode_gejala' => 'G025', 'cf' => 1.0],

            // Tetelo (Newcastle Disease)
            ['id' => 'R12', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R13', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G002', 'cf' => 0.2],
            ['id' => 'R14', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G004', 'cf' => 0.6],
            ['id' => 'R15', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G010', 'cf' => 0.2],
            ['id' => 'R16', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G011', 'cf' => 0.8],
            ['id' => 'R17', 'kode_penyakit' => 'P004', 'kode_gejala' => 'G020', 'cf' => 0.6],

            // Tipus Ayam (Fowl Typhoid)
            ['id' => 'R18', 'kode_penyakit' => 'P005', 'kode_gejala' => 'G001', 'cf' => 0.4],
            ['id' => 'R19', 'kode_penyakit' => 'P005', 'kode_gejala' => 'G016', 'cf' => 0.8],
            ['id' => 'R20', 'kode_penyakit' => 'P005', 'kode_gejala' => 'G023', 'cf' => 0.6],
            ['id' => 'R21', 'kode_penyakit' => 'P005', 'kode_gejala' => 'G028', 'cf' => 1.0],

            // Berak Darah (Coccidiosis)
            ['id' => 'R22', 'kode_penyakit' => 'P006', 'kode_gejala' => 'G006', 'cf' => 0.8],
            ['id' => 'R23', 'kode_penyakit' => 'P006', 'kode_gejala' => 'G009', 'cf' => 0.6],
            ['id' => 'R24', 'kode_penyakit' => 'P006', 'kode_gejala' => 'G010', 'cf' => 0.6],
            ['id' => 'R25', 'kode_penyakit' => 'P006', 'kode_gejala' => 'G030', 'cf' => 1.0],
            ['id' => 'R26', 'kode_penyakit' => 'P006', 'kode_gejala' => 'G031', 'cf' => 0.6],

            // Gumboro (Infectious Bursal Disease)
            ['id' => 'R27', 'kode_penyakit' => 'P007', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R28', 'kode_penyakit' => 'P007', 'kode_gejala' => 'G032', 'cf' => 1.0],
            ['id' => 'R29', 'kode_penyakit' => 'P007', 'kode_gejala' => 'G038', 'cf' => 1.0],
            ['id' => 'R30', 'kode_penyakit' => 'P007', 'kode_gejala' => 'G039', 'cf' => 0.8],

            // Salesma Ayam (Infectious Coryza)
            ['id' => 'R31', 'kode_penyakit' => 'P008', 'kode_gejala' => 'G002', 'cf' => 0.6],
            ['id' => 'R32', 'kode_penyakit' => 'P008', 'kode_gejala' => 'G018', 'cf' => 0.8],
            ['id' => 'R33', 'kode_penyakit' => 'P008', 'kode_gejala' => 'G029', 'cf' => 1.0],

            // Batuk Ayam Menahun (Infectious Bronchitis)
            ['id' => 'R34', 'kode_penyakit' => 'P009', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R35', 'kode_penyakit' => 'P009', 'kode_gejala' => 'G005', 'cf' => 1.0],
            ['id' => 'R36', 'kode_penyakit' => 'P009', 'kode_gejala' => 'G009', 'cf' => 0.6],
            ['id' => 'R37', 'kode_penyakit' => 'P009', 'kode_gejala' => 'G040', 'cf' => 1.0],

            // Busung Ayam (Lymphoid Leukosis)
            ['id' => 'R38', 'kode_penyakit' => 'P010', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R39', 'kode_penyakit' => 'P010', 'kode_gejala' => 'G002', 'cf' => 0.6],
            ['id' => 'R40', 'kode_penyakit' => 'P010', 'kode_gejala' => 'G022', 'cf' => 1.0],
            ['id' => 'R41', 'kode_penyakit' => 'P010', 'kode_gejala' => 'G041', 'cf' => 1.0],

            // Batuk Darah (Infectious Laryngo Tracheitis)
            ['id' => 'R42', 'kode_penyakit' => 'P011', 'kode_gejala' => 'G002', 'cf' => 0.6],
            ['id' => 'R43', 'kode_penyakit' => 'P011', 'kode_gejala' => 'G036', 'cf' => 0.8],
            ['id' => 'R44', 'kode_penyakit' => 'P011', 'kode_gejala' => 'G037', 'cf' => 1.0],
            ['id' => 'R45', 'kode_penyakit' => 'P011', 'kode_gejala' => 'G042', 'cf' => 1.0],

            // Mareks (Mareks Disease)
            ['id' => 'R46', 'kode_penyakit' => 'P012', 'kode_gejala' => 'G001', 'cf' => 0.2],
            ['id' => 'R47', 'kode_penyakit' => 'P012', 'kode_gejala' => 'G017', 'cf' => 0.6],
            ['id' => 'R48', 'kode_penyakit' => 'P012', 'kode_gejala' => 'G035', 'cf' => 0.8],
            ['id' => 'R49', 'kode_penyakit' => 'P012', 'kode_gejala' => 'G043', 'cf' => 1.0],

            // Produksi Telur (Egg Drop Syndrome 76)
            ['id' => 'R50', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G007', 'cf' => 0.6],
            ['id' => 'R51', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G008', 'cf' => 1.0],
            ['id' => 'R52', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G026', 'cf' => 0.6],
            ['id' => 'R53', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G027', 'cf' => 0.6],
            ['id' => 'R54', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G033', 'cf' => 0.2],
            ['id' => 'R55', 'kode_penyakit' => 'P013', 'kode_gejala' => 'G034', 'cf' => 0.4],
        ];

            // Insert data into the database
            DB::table('basis_pengetahuan')->insert($rules);
        }
}
