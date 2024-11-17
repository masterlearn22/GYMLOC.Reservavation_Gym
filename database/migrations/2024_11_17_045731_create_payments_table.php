<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->unsignedBigInteger('reservasi_id');
            $table->string('metode_pembayaran', 150);
            $table->boolean('status_pembayaran')->default(false);
            $table->integer('jumlah');
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('reservasi_id')->references('reservasi_id')->on('reservations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
