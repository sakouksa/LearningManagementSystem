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
        Schema::create('course_lectures', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->unsignedInteger('section_id');
            $table->string('lecture_title')->nullable();
            $table->string('url')->nullable();
            $table->text('content')->nullable();
            $table->decimal('video_duration', 8, 2)->nullable();
            $table->timestamps();
            
            // Add foreign Constraint
            $table->foreign('course_id')->references('id')->on('course_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lectures');
    }
};