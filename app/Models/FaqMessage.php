<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqMessage extends Model
{
    protected $fillable = ['name', 'email', 'message'];
}
