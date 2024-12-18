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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_exam_id')->constrained('job_exams')->onDelete('cascade');
            $table->string('title');
            $table->string('company_name');
            $table->text('description');
            $table->date('posted_date');
            $table->date('deadline');
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->string('location')->nullable();
            $table->string('official_notification')->nullable();
            $table->string('apply_online')->nullable();
            $table->integer('posts')->nullable();
            $table->enum('employment_type', ['part_time', 'full_time'])->nullable();
            $table->json('vacancies')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
