<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymPriceCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('gym_price_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori')->unique(); // Nama kategori
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gym_price_categories');
    }
}
