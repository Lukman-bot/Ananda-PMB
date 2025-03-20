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
        Schema::table('calon_mahasiswa', function (Blueprint $table) {
            $table->enum('status_pendaftaran', ['1', '2', '3'])->nullable()->default(null)->comment('1 = Pending, 2 = Diterima, 3 = Ditolak')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calon_mahasiswa', function (Blueprint $table) {
            $table->enum('status_pendaftaran', ['1', '2', '3'])->default('1')->comment('1 = Pending, 2 = Diterima, 3 = Ditolak')->change();
        });
    }
};
