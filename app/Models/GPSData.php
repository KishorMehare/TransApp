<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPSData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gps_data';
    use HasFactory;
}
