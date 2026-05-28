<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:100', 'unique:blog_categories,name'],
            'slug'       => ['nullable', 'string', 'max:120', 'unique:blog_categories,slug'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['slug']       = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Category created.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:100', Rule::unique('blog_categories', 'name')->ignore($blogCategory->id)],
            'slug'       => ['nullable', 'string', 'max:120', Rule::unique('blog_categories', 'slug')->ignore($blogCategory->id)],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['slug']       = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $blogCategory->update($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Category updated.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog-categories.index')->with('success', 'Category deleted.');
    }
}
