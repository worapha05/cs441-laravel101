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
            $table->enum('course_code', array('2560', '2565'));
            $table->string('code');
            $table->string('thai_name');
            $table->string('eng_name');
            $table->text('thai_description')->nullable();
            $table->text('eng_description')->nullable();
            $table->integer('credit');
            $table->integer('lecture_hours')->nullable();
            $table->integer('practice_hours')->nullable();
            $table->integer('self_study_hours')->nullable();
            $table->string('condition')->nullable();
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
