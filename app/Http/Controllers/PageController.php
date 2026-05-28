<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page     = Page::where('slug', $slug)->firstOrFail();
        $navPages = Page::where('show_in_nav', true)->orderBy('title')->get();

        return view('pages.show', compact('page', 'navPages'));
    }
}
