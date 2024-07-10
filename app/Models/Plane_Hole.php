<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane_Hole extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_hole',
        'type',
        'bio',
        'price',
    ];

    public function hole(){
        return $this->belongsTo(Hole::class);
    }

    public function booking_hole(){
        return $this->hasMany(booking_hole::class);
    }
}
