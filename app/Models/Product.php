<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'price',
        'compare_price',
        'main_image',
        'gallery_images',
        'material',
        'dimensions',
        'lead_time',
        'finish',
        'origin',
        'body',
        'published',
        'sort_order',
    ];

    protected $casts = [
        'published'      => 'boolean',
        'gallery_images' => 'array',
        'price'          => 'decimal:2',
        'compare_price'  => 'decimal:2',
        'sort_order'     => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function formattedPrice(): string
    {
        return '$ ' . number_format((float) $this->price, 2) . ' USD';
    }

    public function formattedComparePrice(): string
    {
        return '$ ' . number_format((float) $this->compare_price, 2) . ' USD';
    }
}
