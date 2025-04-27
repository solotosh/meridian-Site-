<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutLandSurvey extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'author_name',
        'author_image',
        'category',
        'status',
        'link',
        'icon_class',
    ];
}
