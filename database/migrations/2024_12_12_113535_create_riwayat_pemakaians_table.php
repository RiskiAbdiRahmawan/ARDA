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
        Schema::create('riwayat_pemakaians', function (Blueprint $table) {
            $table->id('riwayat_pemakaian_id');
            $table->foreignId('kendaraan_id')->constrained('kendaraans','kendaraan_id');
            $table->date('tanggal');
            $table->string('tujuan');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemakaians');
    }
};
