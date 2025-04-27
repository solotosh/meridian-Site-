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
        Schema::create('about_features', function (Blueprint $table) {
            $table->id();
            Schema::create('about_features', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->nullable();
                $table->string('title');
                $table->text('description');
                $table->timestamps();
            });
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_features');
    }
};
