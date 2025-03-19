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
        Schema::create('program_studi', function (Blueprint $table) {
            $table->integer('id_program_studi', 11)->autoIncrement();
            $table->char('kode_program_studi', 50);
            $table->char('nama_program_studi', 150);
            $table->integer('id_fakultas')->length(11);
            $table->foreign('id_fakultas')->references('id_fakultas')->on('fakultas')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
