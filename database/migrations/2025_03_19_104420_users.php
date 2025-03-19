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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_users', 11)->autoIncrement();
            $table->string('full_name', 255);
            $table->string('alamat_email', 255);
            $table->text('password');
            $table->text('foto_profile')->nullable();
            $table->char('id_role', 2);
            $table->foreign('id_role')->references('id_role')->on('role')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
