<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->enum('manager1_status', ['disetujui', 'ditolak', 'pending'])->default('pending');
            $table->enum('manager2_status', ['disetujui', 'ditolak', 'pending'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn('manager1_status');
            $table->dropColumn('manager2_status');
        });
    }
};
