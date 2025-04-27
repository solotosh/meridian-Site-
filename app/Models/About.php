<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'heading',
        'subheading',
        'description',
        'highlight_number',
        'highlight_text',
        'link_text',
        'link_url',
        'image_top',
        'image_bottom',
    ];
}
