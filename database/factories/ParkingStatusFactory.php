<?php

namespace Database\Factories;

use App\Models\ParkingStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingStatus>
 */

    class ParkingStatusFactory extends Factory
{
    protected $model = ParkingStatus::class;

    public function definition()
    {
        return [
            'status' => $this->faker->word,
            'date' => $this->faker->date,
            'is_available' => $this->faker->boolean,
        ];
    }
}
    
