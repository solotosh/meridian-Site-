<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCustomer extends Model
{
    protected $fillable = ['image', 'alt', 'position', 'label_top', 'label_bottom'];
}
