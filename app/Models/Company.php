<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'license_number',
        'bio',
        'wdate',
        'phone',
        'email',
        'address',
        'password',
    ];

}
