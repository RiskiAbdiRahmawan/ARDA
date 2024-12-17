<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // Jenis aksi (create, update, delete)
            $table->string('model'); // Model yang diubah
            $table->unsignedBigInteger('model_id'); // ID data yang diubah
            $table->unsignedBigInteger('user_id')->nullable(); // ID user yang melakukan aksi
            $table->text('description')->nullable(); // Detail perubahan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
