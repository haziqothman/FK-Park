<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationAndAreaToParkingSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parking_spaces', function (Blueprint $table) {
            $table->string('location');
            $table->string('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parking_spaces', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('area');
        });
    }
}

