<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_category',
        'name',
        'bio',
        'picture',
        'linke',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
