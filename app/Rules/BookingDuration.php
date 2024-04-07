<?php 
// app/Rules/BookingDuration.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Booking;

class BookingDuration implements Rule
{
    protected $vehicleId;

    public function __construct($vehicleId)
    {
        $this->vehicleId = $vehicleId;
    }
    
    public function passes($attribute, $value)
    {
        $start_time = request()->input('start_time');
        $end_time = request()->input('end_time');

       // Check if there are any existing bookings for the same vehicle that overlap with the provided duration
       $conflictingBookings = Booking::where('vehicle_id', $this->vehicleId)
       ->where(function ($query) use ($start_time, $end_time) {
           $query->whereBetween('start_time', [$start_time, $end_time])
                 ->orWhereBetween('end_time', [$start_time, $end_time])
                 ->orWhere(function ($query) use ($start_time, $end_time) {
                     $query->where('start_time', '<=', $start_time)
                           ->where('end_time', '>=', $end_time);
                 });
       })->exists();
        return !$conflictingBookings;
    }

    public function message()
    {
        return 'Booking duration conflicts with existing bookings.';
    }
}
