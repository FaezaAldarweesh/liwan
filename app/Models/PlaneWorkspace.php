<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaneWorkspace extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_workspace',
        'type',
        'bio',
        'price',
    ];

    public function workspace(){
        return $this->belongsTo(workspace::class);
    }
}
