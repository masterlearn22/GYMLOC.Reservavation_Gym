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
            $table->unsignedBigInteger('id_user')->nullable(); // Tambahkan kolom id_user
            $table->string('nama_gym', 50);
            $table->string('city', 50);
            $table->string('alamat', 150);
            $table->string('koordinat', 150)->nullable();
            $table->integer('jarak')->nullable();
            $table->string('deskripsi', 200)->nullable();
            $table->string('fasilitas', 200)->nullable();
            $table->string('foto')->nullable();
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->enum('status',['unpaid','paid']);
            $table->timestamp('approved_at')->nullable(); // Tambahkan kolom approved_at
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('gyms', function (Blueprint $table) {
            $table->dropForeign(['id_user']); // Hapus foreign key constraint
        });
        
        Schema::dropIfExists('gyms');
    }
}