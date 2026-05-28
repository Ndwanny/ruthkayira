<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    private function navPages(): \Illuminate\Database\Eloquent\Collection
    {
        return Page::where('show_in_nav', true)->orderBy('title')->get();
    }

    public function home()
    {
        $recentPosts = Post::published()->limit(3)->get();
        $projects    = Project::published()->orderBy('sort_order')->take(3)->get();
        return view('pages.home', [
            'navPages'    => $this->navPages(),
            'recentPosts' => $recentPosts,
            'projects'    => $projects,
            'settings'    => SiteSetting::all()->keyBy('key'),
        ]);
    }

    public function about()
    {
        $aboutPage = Page::where('slug', 'about')->first();
        return view('pages.about', [
            'navPages'  => $this->navPages(),
            'aboutPage' => $aboutPage,
        ]);
    }

    public function contact()
    {
        $contactPage = Page::where('slug', 'contact')->first();
        return view('pages.contact', [
            'navPages'    => $this->navPages(),
            'contactPage' => $contactPage,
        ]);
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been received. Ruth will get back to you within 24–48 hours.');
    }
}
