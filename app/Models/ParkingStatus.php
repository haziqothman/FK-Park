<?php

// app/Models/ParkingStatus.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingStatus extends Model
{
    protected $fillable = ['status', 'date', 'is_available', 'parking_space_id'];

    // Define the inverse relationship with ParkingSpace
    public function parkingSpace()
    {
        return $this->belongsTo(ParkingSpace::class);
    }
}
