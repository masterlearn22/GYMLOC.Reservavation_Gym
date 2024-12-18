<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservasi_id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('gym_id');
            $table->timestamp('tgl_reservasi');
            $table->datetime('tgl_berakhir');
            $table->boolean('status')->default(false);
            $table->integer('total_harga');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('gym_id')->references('gym_id')->on('gyms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
