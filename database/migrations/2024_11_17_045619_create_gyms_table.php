<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymsTable extends Migration
{
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->id('gym_id');
            $table->string('nama_gym', 50);
            $table->string('alamat', 150);
            $table->string('koordinat', 150)->nullable();
            $table->integer('jarak')->nullable();
            $table->string('deskripsi', 200)->nullable();
            $table->string('fasilitas', 200);
            $table->string('foto')->nullable();
            $table->string('jam_operasional', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gyms');
    }
}

