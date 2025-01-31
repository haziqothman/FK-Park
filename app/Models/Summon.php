<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    use HasFactory;

    protected $table = 'summons';

    protected $primaryKey = 'summon_id';

    public $timestamps = false;
    protected $fillable = [
        'id', 
        'summonCategory',
        'summonAmount',
        'demeritPoint',
    ];

    
}
