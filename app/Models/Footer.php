<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'about_text', 'address', 'phone', 'email', 'logo', 'copyright'
    ];

}
