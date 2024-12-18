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
        Schema::create('sp_qual_job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sp_id')->constrained('special_qualifications');
            $table->foreignId('job_id')->constrained('job_exams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_qual_job');
    }
};
