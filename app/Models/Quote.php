<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['name', 'email', 'phone','location','details', 'title_deed'];
}
