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
        Schema::create('alamat_mahasiswa', function (Blueprint $table) {
            $table->integer('id_alamat_mahasiswa', 11)->autoIncrement();
            $table->integer('id_calon_mahasiswa')->length(11);
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('calon_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->text('alamat');
            $table->integer('id_provinsi')->length(11);
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_kota_kabupaten')->length(11);
            $table->foreign('id_kota_kabupaten')->references('id_kota_kabupaten')->on('kota_kabupaten')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_kecamatan')->length(11);
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kelurahan', 100);
            $table->string('kode_pos', 10);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_mahasiswa');
    }
};
