<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Page;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts     = Post::count();
        $publishedPosts = Post::where('published', true)->count();
        $draftPosts     = Post::where('published', false)->count();
        $totalPages     = Page::count();

        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts', 'publishedPosts', 'draftPosts', 'totalPages', 'recentPosts'
        ));
    }
}
