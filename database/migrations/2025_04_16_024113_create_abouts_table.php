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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('subheading')->nullable();
            $table->text('description')->nullable();
            $table->string('image_top')->nullable();
            $table->string('image_bottom')->nullable();
            $table->json('features')->nullable(); // store array of features as JSON
            $table->integer('projects')->default(0);
            $table->integer('experience_years')->default(0);
            $table->integer('team_members')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
