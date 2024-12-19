<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Alter 'penyakit' table
        Schema::table('penyakit', function (Blueprint $table) {
            // Drop the existing primary key constraint
            $table->dropPrimary();
            
            // Change 'kode_penyakit' to string
            $table->string('kode_penyakit')->change();
            
            // Re-apply the primary key on 'kode_penyakit'
            $table->primary('kode_penyakit');
        });

        // Alter 'gejala' table
        Schema::table('gejala', function (Blueprint $table) {
            // Drop the existing primary key constraint
            $table->dropPrimary();

            // Change 'kode_gejala' to string
            $table->string('kode_gejala')->change();
            
            // Re-apply the primary key on 'kode_gejala'
            $table->primary('kode_gejala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes for 'penyakit' table
        Schema::table('penyakit', function (Blueprint $table) {
            // Drop the primary key constraint
            $table->dropPrimary();
            
            // Change 'kode_penyakit' back to integer
            $table->integer('kode_penyakit')->change();
            
            // Re-apply the primary key on 'kode_penyakit'
            $table->primary('kode_penyakit');
        });

        // Revert changes for 'gejala' table
        Schema::table('gejala', function (Blueprint $table) {
            // Drop the primary key constraint
            $table->dropPrimary();

            // Change 'kode_gejala' back to integer
            $table->integer('kode_gejala')->change();
            
            // Re-apply the primary key on 'kode_gejala'
            $table->primary('kode_gejala');
        });
    }
};
