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
        Schema::create('calon_mahasiswa', function (Blueprint $table) {
            $table->integer('id_calon_mahasiswa', 11)->autoIncrement();
            $table->integer('id_users')->length(11);
            $table->foreign('id_users')->references('id_users')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_lengkap', 255);
            $table->string('nik', 16);
            $table->string('nisn', 10);
            $table->integer('id_kota_kabupaten')->length(11);
            $table->foreign('id_kota_kabupaten')->references('id_kota_kabupaten')->on('kota_kabupaten')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->comment('L = Laki-laki, P = Perempuan');
            $table->integer('id_agama')->length(11);
            $table->foreign('id_agama')->references('id_agama')->on('agama')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp', 15);
            $table->string('email', 255);
            $table->enum('status_pendaftaran', ['1', '2', '3'])->default('1')->comment('1 = Pending, 2 = Diterima, 3 = Ditolak');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_mahasiswa');
    }
};
