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
        Schema::create('administrator_centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrator_id')->constrained('administrators')->onDelete('cascade')->nullable();
            $table->foreignId('center_id')->constrained('centers')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrator_centers');
    }
};
