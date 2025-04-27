<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    
    protected $fillable = ['location', 'phone', 'email', 'socials'];

    protected $casts = [
        'socials' => 'array',
    ];

}
