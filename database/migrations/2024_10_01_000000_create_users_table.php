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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('name', 60);
            $table->string('username', 60)->default('user_default');
            $table->string('password', 60);
            $table->string('email', 60);
            $table->longText('profile_photo')->nullable();
            $table->string('id_role', 30)->nullable();
            $table->boolean('is_gym_requested')->default(false);
            $table->decimal('saldo', 10, 2)->default(0.00); // Kolom saldo dengan default 0.00
            $table->string('remember_token')->nullable();
            $table->timestamps();
            
            $table->foreign('id_role')->references('id_role')->on('role');
        });
        
        
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->string('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_photo');
            $table->dropColumn('remember_token');
        });
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
