<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'email2',
        'email',
        'phone',
        'phone2',
        'address',
        'map_lat',
        'map_lng',
        'map_title',
    ];
}
