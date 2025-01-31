<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\ParkingSpace;
use App\Models\Booking;
use App\Models\ParkingStatus;
use App\Models\QRCode;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        ParkingStatus::factory(10)->create();
        ParkingSpace::factory(10)->create();
        Vehicle::factory(10)->create();
        Booking::factory(10)->create();
        QRCode::factory(10)->create();
    }
}
