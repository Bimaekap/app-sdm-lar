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
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete()->nullOnUpdate();
            $table->string('jenis_cuti')->nullable();
            $table->string('file_pengajuan')->nullable();
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
        Schema::dropIfExists('pengajuan_cuti');
    }
};
