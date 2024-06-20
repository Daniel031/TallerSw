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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('donation_date');
            $table->char('type_donation', 1);
            $table->float('economic_contribution')->nullable();
            $table->foreignId('donor_id')->nullable();
            $table->foreignId('sucursal_id')->nullable();
            $table->foreignId('publication_id')->constrained('publications')->onDelete('cascade')->nullable();
            $table->boolean('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
