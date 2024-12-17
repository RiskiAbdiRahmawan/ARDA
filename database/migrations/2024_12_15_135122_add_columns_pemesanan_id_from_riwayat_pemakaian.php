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
        Schema::table('riwayat_pemakaians', function (Blueprint $table) {
            // Menambahkan kolom pemesanan_id sebagai foreign key
            $table->foreignId('pemesanan_id')->constrained('pemesanans', 'pemesanan_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_pemakaians', function (Blueprint $table) {
            //
        });
    }
};
