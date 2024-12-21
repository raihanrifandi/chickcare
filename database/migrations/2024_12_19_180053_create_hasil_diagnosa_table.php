<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilDiagnosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->id('id_hasil'); // Primary key
            $table->date('tanggal_diagnosa'); // Tanggal diagnosa
            $table->string('penyakit_kode'); // Foreign key ke tabel penyakit dengan kode_penyakit sebagai primary key
            $table->json('gejala_dan_kepercayaan'); // JSON untuk menyimpan gejala dan nilai kepercayaan
            $table->decimal('persentase', 5, 2); // Persentase nilai CF tertinggi (0.00 - 100.00)
            $table->timestamps(); // Created at & Updated at

            // Tambahkan foreign key
            $table->foreign('penyakit_kode')
                ->references('kode_penyakit')
                ->on('penyakit')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_diagnosa');
    }
}
