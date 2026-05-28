<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('title')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'slug'          => ['nullable', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'compare_price' => ['nullable', 'numeric', 'min:0'],
            'main_image'    => ['nullable', 'image', 'max:4096'],
            'gallery_images'=> ['nullable', 'array'],
            'gallery_images.*' => ['image', 'max:4096'],
            'material'      => ['nullable', 'string', 'max:255'],
            'dimensions'    => ['nullable', 'string', 'max:255'],
            'lead_time'     => ['nullable', 'string', 'max:255'],
            'finish'        => ['nullable', 'string', 'max:255'],
            'origin'        => ['nullable', 'string', 'max:255'],
            'body'          => ['nullable', 'string'],
            'published'     => ['nullable', 'boolean'],
            'sort_order'    => ['nullable', 'integer'],
        ]);

        $data['slug']       = $data['slug'] ? Str::slug($data['slug']) : $this->uniqueSlug($request->title);
        $data['published']  = $request->has('published');
        $data['sort_order'] = $request->input('sort_order', 0);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
        }
        $data['gallery_images'] = $galleryPaths ?: null;

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'slug'          => ['nullable', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'compare_price' => ['nullable', 'numeric', 'min:0'],
            'main_image'    => ['nullable', 'image', 'max:4096'],
            'gallery_images'=> ['nullable', 'array'],
            'gallery_images.*' => ['image', 'max:4096'],
            'material'      => ['nullable', 'string', 'max:255'],
            'dimensions'    => ['nullable', 'string', 'max:255'],
            'lead_time'     => ['nullable', 'string', 'max:255'],
            'finish'        => ['nullable', 'string', 'max:255'],
            'origin'        => ['nullable', 'string', 'max:255'],
            'body'          => ['nullable', 'string'],
            'published'     => ['nullable', 'boolean'],
            'sort_order'    => ['nullable', 'integer'],
        ]);

        $data['published']  = $request->has('published');
        $data['sort_order'] = $request->input('sort_order', 0);

        if (!empty($data['slug'])) {
            $data['slug'] = Str::slug($data['slug']);
        } else {
            unset($data['slug']);
        }

        if ($request->hasFile('main_image')) {
            if ($product->main_image && !str_starts_with($product->main_image, 'http')) {
                Storage::disk('public')->delete($product->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        } else {
            unset($data['main_image']);
        }

        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
            $data['gallery_images'] = $galleryPaths;
        } else {
            unset($data['gallery_images']);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->main_image && !str_starts_with($product->main_image, 'http')) {
            Storage::disk('public')->delete($product->main_image);
        }
        if ($product->gallery_images) {
            foreach ($product->gallery_images as $img) {
                if (!str_starts_with($img, 'http')) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    private function uniqueSlug(string $title): string
    {
        $slug  = Str::slug($title);
        $count = Product::where('slug', 'like', $slug . '%')->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}
