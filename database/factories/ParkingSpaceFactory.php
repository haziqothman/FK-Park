<?php

namespace Database\Factories;

use App\Models\ParkingSpace;
use App\Models\ParkingStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingSpace>
 */
class ParkingSpaceFactory extends Factory
{
    protected $model = ParkingSpace::class;

    public function definition()
    {
        return [
            'status_id' => ParkingStatus::factory(),
            'location' => $this->faker->address,
        ];
    }
}
