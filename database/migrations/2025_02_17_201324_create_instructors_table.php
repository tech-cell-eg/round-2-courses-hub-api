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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('country');
            $table->string('city');
            $table->string('first_address');
            $table->string('second_address');
            $table->string('zip_code');
            $table->string('choose_file');
            $table->string('password');
            $table->string('intended_study_field');
            $table->string('degree-sought');
            $table->string('begin-studies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
