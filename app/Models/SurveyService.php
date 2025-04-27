<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyService extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'short_des',
        'description',
        'image',
        'link',
        'slug'
    ];
}
