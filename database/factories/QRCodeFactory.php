<?php

namespace Database\Factories;

use App\Models\QRCode;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QRCode>
 */

    class QRCodeFactory extends Factory
    {
        protected $model = QRCode::class;
    
        public function definition()
        {
            return [
                'booking_id' => Booking::factory(),
                'qr_code' => $this->faker->uuid,
            ];
    }
}
