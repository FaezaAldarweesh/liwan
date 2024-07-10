<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_hole',
        'name',
        'price',
    ];

    public function hole(){
        return $this->belongsTo(Hole::class);
    }
    public function booking_holes()
    {
        return $this->belongsToMany(booking_hole::class, 'booking_services');
    }
}
