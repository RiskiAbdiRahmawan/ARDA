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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id('kendaraan_id');
            $table->string('nama');
            $table->enum('jenis',['angkutan orang','angkutan barang']);
            $table->enum('status',['tersedia','tidak Tersedia']);
            $table->foreignId('user_id')->constrained('users','user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
