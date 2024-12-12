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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('pemesanan_id');
            $table->foreignId('user_id')->constrained('users','user_id');
            $table->foreignId('driver_id')->constrained('drivers','driver_id');
            $table->foreignId('kendaraan_id')->constrained('kendaraans','kendaraan_id');
            $table->date('tanggal_pemesanan');
            $table->enum('status',['pengajuan','disetujui','ditolak'])->default('pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
