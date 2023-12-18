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
        Schema::create('unit_bisnis', function (Blueprint $table) {
            $table->increments('id_unit_bisnis');
            $table->string('nama_unit_bisnis');
            $table->string('deskripsi_unit_bisnis');
            $table->string('logo_unit_bisnis');
            $table->string('url_unit_bisnis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_bisnis');
    }
};
