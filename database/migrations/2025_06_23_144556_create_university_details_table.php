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
        Schema::create('university_details', function (Blueprint $table) {
             $table->id();
            $table->string('user_email');
            $table->string('uni_name');
            $table->string('course');
            $table->integer('semester');
            $table->string('books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_details');
    }
};
