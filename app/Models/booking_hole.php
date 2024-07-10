<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_hole extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_hole',
        'id_plan',
        'date',
        'total_price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function hole(){
        return $this->belongsTo(Hole::class);
    }

    public function plan(){
        return $this->belongsTo(Plane_Hole::class);
    }
    
    public function services()
    {
        return $this->belongsToMany(services::class, 'booking_services');
    }
}
