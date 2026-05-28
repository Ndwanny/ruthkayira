<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'content',
        'hero_image',
        'meta_description',
        'show_in_nav',
    ];

    protected $casts = [
        'show_in_nav' => 'boolean',
        'content'     => 'array',
    ];

    public function getContent(string $key, string $default = ''): string
    {
        return $this->content[$key] ?? $default;
    }
}
