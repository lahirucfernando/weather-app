<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTemperature extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','user_id','city_id','celsius','fahrenheit','created_at','updated_at'
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('D, d M Y, g:i a');
    }
}
