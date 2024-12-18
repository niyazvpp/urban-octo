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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('phone_number', 15)->unique()->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'divorced', 'widowed', 'other', 'married'])->nullable();
            $table->string('avatar')->nullable();
            $table->foreignId('state_id')->default(12)->constrained()->onUpdate('cascade');
            $table->foreignId('mahall')->constrained('admins')->onUpdate('cascade');
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->integer('otp')->nullable();
            $table->timestamp('otp_sent_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('interest_area')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
