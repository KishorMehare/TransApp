<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $guarded = null;


    public function createdBy(){
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function companyId(){
        return $this->belongsTo(TruckCompany::class);
    }
}
