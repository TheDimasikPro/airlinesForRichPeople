<?php

namespace App\Models;

use App\Http\Controllers\FlightController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'id',
    //     'iata_code',
    //     'name_eng',
    // ];
    public function flights()
    {
        return $this->hasMany(FlightController::class);
    }
}
