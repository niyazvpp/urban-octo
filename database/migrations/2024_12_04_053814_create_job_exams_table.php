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
        Schema::create('job_exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('gov', ['centre', 'state']);
            $table->integer('min_age')->default(18);
            $table->integer('max_age');
            $table->enum('gender', ['male', 'female', 'all']);
            $table->enum('type', ['exam', 'job']);
            $table->foreignId('interest_area_id')->constrained()->onUpdate('cascade');
            $table->json('obc_special')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade');
            $table->boolean('verified')->default(false);
            $table->string('highest_qual')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_exams');
    }
};
