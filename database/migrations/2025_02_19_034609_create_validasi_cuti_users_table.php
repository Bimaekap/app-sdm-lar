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
        Schema::create('validasi_cuti_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullCascadeOnDelete()->nullCascadeOnUpdate();
            $table->string('nama_pimpinan')->nullable();
            $table->string('nama_pengaju')->nullable();
            $table->string('jenis_cuti')->nullable();
            $table->string('jenis_pengajuan')->nullable();
            $table->integer('jumlah_cuti')->nullable();
            $table->boolean('izin_1')->default(0); /** Izin HRD */
            $table->boolean('izin_2')->default(0); /** Izin Kepala HRD */
            $table->boolean('izin_3')->default(0); /** Izin Kepalasa Divisi */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi_cuti_users');
    }
};
