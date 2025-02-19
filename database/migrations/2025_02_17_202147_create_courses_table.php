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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('course_description');
            $table->text('what_will_i_learn_from_this_course');
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->string('language');
            $table->json('curriculum');
            $table->string('skill_level');
            $table->string('price');
            $table->json('course_day');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('enrolled_number');
            $table->foreignId('instructor_id')->references('id')->on('instructors')->cascadeOnDelete();
            $table->foreignId('review_id')->nullable()->references('id')->on('reviews')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
