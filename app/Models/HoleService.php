<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoleService extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

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
        return $this->belongsToMany(BookingHole::class);
    }
}
