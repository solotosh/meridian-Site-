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
        Schema::create('about_customers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('alt')->nullable();
            $table->unsignedInteger('position')->default(0); // for spacing
            $table->string('label_top')->nullable();  // e.g. "5m+ Trusted"
            $table->string('label_bottom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_customers');
    }
};
