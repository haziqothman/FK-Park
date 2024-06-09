<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ManageUsers extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 
        'email',
        'userType',
        'password', 
    ];

    static public function getRecord()
    {
        return ManageUsers::select('users.*', 'summons.summonAmount as summonAmount')
        ->join('summons','summons.id', '=','users.id')
        ->orderBy('users.id', 'desc')-> get();
    }
    
    use HasFactory, Notifiable;
}
