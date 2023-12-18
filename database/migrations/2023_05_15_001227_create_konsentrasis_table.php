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
        Schema::create('konsentrasi', function (Blueprint $table) {
            $table->increments('id_konsentrasi');
            $table->string('judul_konsentrasi');
            $table->text('deskripsi_konsentrasi');
            $table->string('gambar_konsentrasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsentrasi');
    }
};
