<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'url', 'type', 'position', 'parent_id', 'is_active',
    ];

   
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
    // In Menu.php model
public function children()
{
    return $this->hasMany(Menu::class, 'parent_id');
}

}
