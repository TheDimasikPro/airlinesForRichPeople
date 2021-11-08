<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    
    public function airports()
    {
        return $this->belongsTo(Airport::class);
    }
    public function airport_start()
    {
        return $this->belongsTo(Airport::class,'id_airport_start','id');
    }
    public function airport_end()
    {
        return $this->belongsTo(Airport::class,'id_airport_end','id');
    }
}
