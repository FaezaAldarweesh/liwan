<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingWorkspace extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_user',
        'id_disk',
        'id_plan',
        'date',
        'total_price',
        'statuse',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workspace(){
        return $this->belongsTo(workspace::class);
    }

    public function workspace_services()
    {
        return $this->belongsToMany(WorkspaceService::class);
    }
}
