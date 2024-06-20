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
        Schema::create('donation_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('amount');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade')->nullable();
            $table->foreignId('donation_id')->constrained('donations')->onDelete('cascade')->nullable();
            $table->boolean('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_articles');
    }
};
