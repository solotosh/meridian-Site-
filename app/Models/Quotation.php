<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'title_deed_path'];

}
