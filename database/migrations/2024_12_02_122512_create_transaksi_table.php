<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('type'); // topup, pembayaran, penarikan, dll
            $table->decimal('amount', 15, 2);
            $table->string('method')->nullable(); // gopay, dana, transfer bank, dll
            $table->string('status')->default('pending'); // pending, success, failed
            $table->text('description')->nullable();
            $table->string('reference_number')->nullable(); // nomor referensi transaksi
            $table->json('metadata')->nullable(); // untuk menyimpan detail tambahan

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}