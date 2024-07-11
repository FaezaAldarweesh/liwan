<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingHole extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_user',
        'id_hole',
        'id_plan',
        'date',
        'total_price',
        'statuse',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function hole(){
        return $this->belongsTo(Hole::class);
    }

    public function plan(){
        return $this->belongsTo(PlaneHole::class);
    }
    
    public function hole_services()
    {
        return $this->belongsToMany(HoleService::class);
    }
}
