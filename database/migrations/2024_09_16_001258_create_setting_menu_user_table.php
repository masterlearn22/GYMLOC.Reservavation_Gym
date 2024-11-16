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
        Schema::create('SETTING_MENU_USER', function (Blueprint $table) {
            $table->unsignedBigInteger('MENU_ID')->nullable();
            // Gunakan string untuk NO_SETTING sebagai primary key
            $table->string('NO_SETTING', 30)->primary();
            
            // Gunakan string untuk id_role sebagai foreign key ke tabel role
            $table->string('id_role')->nullable(); // Foreign key ke tabel role
            
            // Gunakan string untuk MENU_ID sebagai foreign key ke tabel menu
            
            // Tambahkan kolom lainnya
            $table->string('CREATE_BY', 30)->nullable();   // Siapa yang membuat data
            $table->timestamp('CREATE_DATE')->nullable();  // Tanggal pembuatan
            $table->string('DELETE_MARK', 1)->nullable();  // Penanda jika dihapus
            $table->string('UPDATE_BY', 30)->nullable();   // Siapa yang update data
            $table->timestamp('UPDATE_DATE')->nullable();  // Tanggal update
        
            // Tambahkan foreign key ke tabel role
            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
            
            // Tambahkan foreign key ke tabel menu
            $table->foreign('MENU_ID')->references('MENU_ID')->on('menu')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SETTING_MENU_USER');
    }
};