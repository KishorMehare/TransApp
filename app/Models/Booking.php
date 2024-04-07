<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'driver_id', 'start_time', 'end_time','user_id'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
