<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkspaceService extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_workspace',
        'name',
        'price',
    ];

    public function workspace(){
        return $this->belongsTo(workspace::class);
    }
    public function booking_workspaces()
    {
        return $this->belongsToMany(BookingWorkspace::class);
    }
}

