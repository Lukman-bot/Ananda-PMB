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
        Schema::table('jalur_kuliah', function (Blueprint $table) {
            $table->text('deskripsi_jalur_kuliah')->nullable()->after('slug_jalur_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jalur_kuliah', function (Blueprint $table) {
            $table->dropColumn('deskripsi_jalur_kuliah');
        });
    }
};
