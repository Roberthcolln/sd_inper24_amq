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
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id_setting');
            $table->string('instansi_setting');
            $table->string('pimpinan_setting');
            $table->string('logo_setting');
            $table->string('favicon_setting');
            $table->string('tentang_setting');
            $table->string('keyword_setting');
            $table->string('alamat_setting');
            $table->string('instagram_setting');
            $table->string('youtube_setting');
            $table->string('email_setting');
            $table->string('no_hp_setting');
            $table->string('maps_setting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
