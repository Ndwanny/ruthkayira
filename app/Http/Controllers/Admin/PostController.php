<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $categoryNames = BlogCategory::pluck('name')->toArray();
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'excerpt'     => ['nullable', 'string', 'max:500'],
            'category'    => ['required', 'string', 'in:' . implode(',', $categoryNames)],
            'body'        => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'published'   => ['nullable', 'boolean'],
        ]);

        $data['slug']      = $this->uniqueSlug($request->title);
        $data['published'] = $request->has('published');

        if ($data['published']) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $categoryNames = BlogCategory::pluck('name')->toArray();
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'excerpt'     => ['nullable', 'string', 'max:500'],
            'category'    => ['required', 'string', 'in:' . implode(',', $categoryNames)],
            'body'        => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'published'   => ['nullable', 'boolean'],
        ]);

        $wasPublished      = $post->published;
        $data['published'] = $request->has('published');

        if ($data['published'] && ! $wasPublished) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }

    private function uniqueSlug(string $title): string
    {
        $slug  = Str::slug($title);
        $count = Post::where('slug', 'like', $slug . '%')->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}
