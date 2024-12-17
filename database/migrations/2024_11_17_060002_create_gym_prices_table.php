<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymPricesTable extends Migration
{
    public function up()
    {
        Schema::create('gym_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gym_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('durasi')->nullable(); // Null untuk "Per Sesi"
            $table->bigInteger('harga');
            $table->timestamps();

            $table->foreign('gym_id')->references('gym_id')->on('gyms')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('gym_price_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gym_prices');
    }
}
