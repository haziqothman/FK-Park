<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->constrained()->onDelete('cascade');
            $table->foreignId('vehicleID')->constrained()->onDelete('cascade');
            $table->foreignId('spaceID')->constrained()->onDelete('cascade');
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->string('bookingStatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
