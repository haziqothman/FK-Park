<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\ParkingSpace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'vehicle_id' => Vehicle::factory(),
            'parking_space_id' => ParkingSpace::factory(),
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime,
            'booking_status' => $this->faker->randomElement(['booked', 'cancelled', 'completed']),
        ];
    }
}
