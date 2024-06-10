<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = "parking_spaces";
    protected $primaryKey = "ID";
    protected $fillable = [
        'location', 
        'created_at',
        'updated_at',
    ];
    
    use HasFactory;
}
