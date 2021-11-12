<?php

namespace App\Models;

use App\Http\Controllers\FlightController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function passengers()
    {
        return $this->hasMany(Passenger::class,'id_booking','id');
    }
    public function flights_from()
    {
        return $this->belongsTo(Booking::class,'id','id_flight_from');
    }
    public function flights_back()
    {
        return $this->belongsTo(Booking::class,'id','id_flight_back');
    }
}
