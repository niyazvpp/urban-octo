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
        Schema::create('interest_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 'Web Development'
            $table->string('image')->nullable(); //
            $table->text('description')->nullable(); // Optional description about the interest area
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interest_areas');
    }
};
