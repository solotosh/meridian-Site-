<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Blog extends Model
{
    
        protected $fillable = [
            'title', 'category', 'author', 'publish_date', 'excerpt', 'content', 'image', 'author_image'
        ];
   
        public function comments()
        {
            return $this->hasMany(BlogComment::class);
        }
        
        protected static function booted()
{
    static::creating(function ($blog) {
        $blog->slug = Str::slug($blog->title);
    });

    static::updating(function ($blog) {
        $blog->slug = Str::slug($blog->title);
    });
}
}
