<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    protected $table = "summon";
    protected $primaryKey = "summonID";
    protected $fillable = [
        'summonCategory', 
        'summonAmount',
        'demeritPoint',
    ];
    use HasFactory;
}
