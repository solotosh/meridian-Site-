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
        Schema::create('about_counters', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // e.g., Project Complete
            $table->unsignedInteger('value'); // e.g., 32
            $table->string('suffix')->nullable(); // e.g., + or k+
            $table->string('background_color')->default('primary'); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_counters');
    }
};
