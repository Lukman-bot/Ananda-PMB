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
        Schema::create('kota_kabupaten', function (Blueprint $table) {
            $table->integer('id_kota_kabupaten', 11)->autoIncrement();
            $table->char('nama_kota_kabupaten', 255);
            $table->integer('id_provinsi')->length(11);
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota_kabupaten');
    }
};
