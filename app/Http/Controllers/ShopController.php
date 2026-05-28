<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::published()->orderBy('sort_order')->get();
        return view('pages.shop', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->where('published', true)->firstOrFail();
        $related = Product::published()->where('id', '!=', $product->id)->take(2)->get();
        return view('shop.show', compact('product', 'related'));
    }
}
