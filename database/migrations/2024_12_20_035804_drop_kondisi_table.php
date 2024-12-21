<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('kondisi');
    }

    public function down()
    {
        Schema::create('kondisi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};