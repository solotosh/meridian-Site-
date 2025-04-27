<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCounter extends Model
{
    protected $fillable = [
        'label',
        'value',
        'suffix',
        'background_color',
      
    ];
}
