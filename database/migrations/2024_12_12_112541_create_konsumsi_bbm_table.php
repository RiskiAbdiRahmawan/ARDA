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
        Schema::create('konsumsi_bbm', function (Blueprint $table) {
            $table->id('konsumsi_bbm_id');
            $table->foreignId('kendaraan_id')->constrained('kendaraans','kendaraan_id');
            $table->date('tanggal');
            $table->float('jumlah_bbm');
            $table->decimal('biaya',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumsi_bbm');
    }
};
