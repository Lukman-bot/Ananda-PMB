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
        Schema::create('persyaratan_administrasi', function (Blueprint $table) {
            $table->integer('id_persyaratan_administrasi', 11)->autoIncrement();
            $table->integer('id_jalur_kuliah')->length(11);
            $table->foreign('id_jalur_kuliah')->references('id_jalur_kuliah')->on('jalur_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_jenis_berkas')->length(11);
            $table->foreign('id_jenis_berkas')->references('id_jenis_berkas')->on('jenis_berkas')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persyaratan_administrasi');
    }
};
