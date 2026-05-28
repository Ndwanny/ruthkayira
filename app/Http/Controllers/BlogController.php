<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        $query      = Post::published();

        if ($request->filled('category')) {
            $cat = $categories->firstWhere('slug', $request->category);
            if ($cat) {
                $query->where('category', $cat->name);
            }
        }

        $posts    = $query->paginate(9)->withQueryString();
        $navPages = Page::where('show_in_nav', true)->orderBy('title')->get();

        return view('blog.index', compact('posts', 'navPages', 'categories'));
    }

    public function show(string $slug)
    {
        $post     = Post::where('slug', $slug)->where('published', true)->firstOrFail();
        $navPages = Page::where('show_in_nav', true)->orderBy('title')->get();

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->limit(2)
            ->get();

        if ($relatedPosts->count() < 2) {
            $relatedPosts = Post::published()
                ->where('id', '!=', $post->id)
                ->limit(2)
                ->get();
        }

        return view('blog.show', compact('post', 'navPages', 'relatedPosts'));
    }
}
