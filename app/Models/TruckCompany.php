<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckCompany extends Model
{
    use HasFactory;
    protected $guarded = null;

    public function vehicles(){
        return $this->hasMany(Vehicles::class);
    }
}

