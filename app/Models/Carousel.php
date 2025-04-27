<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'alignment',
    ];
}
