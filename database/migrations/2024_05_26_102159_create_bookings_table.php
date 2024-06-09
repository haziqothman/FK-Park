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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->constrained()->onDelete('cascade');
            $table->foreignId('vehicleID')->constrained()->onDelete('cascade');
            $table->foreignId('spaceID')->constrained()->onDelete('cascade');
            $table->dateTime('starTime');
            $table->dateTime('endTime');
            $table->string('bookingStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
