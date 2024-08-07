<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function holes(){
        return $this->hasMany(Hole::class);
    }
}
