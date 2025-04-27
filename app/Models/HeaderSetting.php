<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    protected $fillable = [
        'address',
        'hours',
        'phone',
        'email',
        'logo',
        'mobile_logo',
        'social_links',
    ];
}
