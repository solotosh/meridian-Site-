<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChooseUsReason extends Model
{
    protected $fillable = [
        'icon_class',
        'title',
        'description'
    ];
}
