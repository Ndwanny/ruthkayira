<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::published()->orderBy('sort_order')->get();
        return view('pages.portfolio', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->where('published', true)->firstOrFail();
        return view('portfolio.show', compact('project'));
    }
}
