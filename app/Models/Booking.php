<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'bookingID';

    public $timestamps = true; // This should be true if you're using timestamps

    protected $fillable = [
        'userID',
        'vehicleID',
        'spaceID',
        'startTime',
        'endTime',
        'bookingStatus',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleID');
    }

    public function parkingSpace()
    {
        return $this->belongsTo(ParkingSpace::class, 'spaceID');
    }
}
