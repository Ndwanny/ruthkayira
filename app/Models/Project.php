<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'tagline',
        'client',
        'date_range',
        'services',
        'deliverables',
        'website_url',
        'icon_url',
        'hero_image',
        'image_1',
        'image_2',
        'exec_image',
        'about_col1',
        'about_col2',
        'exec_col1',
        'exec_col2',
        'category',
        'sort_order',
        'published',
    ];

    protected $casts = [
        'published'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
