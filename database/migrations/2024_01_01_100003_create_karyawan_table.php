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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik')->index();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jabatan')->nullable();
            $table->integer('umur')->nullable();
            $table->text('alamat')->nullable();
            $table->dateTime('tanggal_masuk_kerja')->nullable();
            $table->string('status_karyawan')->nullable();
            $table->foreignId('id_departemen')->nullable()->constrained('departemen')->onDelete('set null');
            $table->foreignId('id_plant')->nullable()->constrained('plant')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};

