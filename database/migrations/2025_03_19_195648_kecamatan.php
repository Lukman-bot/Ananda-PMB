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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->integer('id_kecamatan', 11)->autoIncrement();
            $table->char('nama_kecamatan', 255);
            $table->integer('id_kota_kabupaten')->length(11);
            $table->foreign('id_kota_kabupaten')->references('id_kota_kabupaten')->on('kota_kabupaten')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};
