<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hole extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

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
        return $this->hasMany(PlaneHole::class);
    }

    public function hole_services(){
        return $this->hasMany(HoleService::class);
    }

    public function booking_hole(){
        return $this->hasMany(BookingHole::class);
    }
}
