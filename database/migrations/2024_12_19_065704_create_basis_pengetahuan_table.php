<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->string('id')->primary(); // Custom ID formatnya "R1", "R2", dst.
            $table->string('kode_penyakit'); 
            $table->string('kode_gejala'); 
            $table->float('cf', 2, 1); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->onDelete('cascade');
            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basis_pengetahuan');
    }
};
