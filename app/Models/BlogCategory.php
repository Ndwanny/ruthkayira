<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category', 'name');
    }

    protected static function booted(): void
    {
        static::saving(function (self $cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
    }
}
