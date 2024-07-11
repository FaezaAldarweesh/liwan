<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_center',
        'id_category',
        'name',
        'bio',
        'picture',
    ];

    public function category_food(){
        return $this->belongsTo(CategoryFood::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
