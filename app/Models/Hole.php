<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hole extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_center',
        'name',
        'bio',
        'description',
        'picture',
        'statuse',
    ];

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function plane_holes(){
        return $this->hasMany(Plane_Hole::class);
    }

    public function services(){
        return $this->hasMany(services::class);
    }

    public function booking_hole(){
        return $this->hasMany(booking_hole::class);
    }
}
