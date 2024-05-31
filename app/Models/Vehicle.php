<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // Define any necessary relationships, fillable properties, etc.
    protected $fillable = [
        'user_id',
        'plate_number',
        // Other columns...
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
