<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workspace extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_center',
        'name',
        'bio',
        'work_time',
        'picture',
        'number_of_disks',
        'statuse',
    ];

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function plane_workspaces(){
        return $this->hasMany(PlaneWorkspace::class);
    }

    public function disks(){
        return $this->hasMany(Disk::class);
    }

    public function workspace_services(){
        return $this->hasMany(WorkspaceService::class);
    }

    public function booking_workspaces(){
        return $this->hasMany(BookingWorkspace::class);
    }

}
