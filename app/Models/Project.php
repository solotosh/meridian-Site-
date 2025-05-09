<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'tagline', 'description', 'image', 'icon', 'link'];
}
