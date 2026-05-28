<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->orderBy('title')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255'],
            'tagline'     => ['nullable', 'string', 'max:500'],
            'client'      => ['nullable', 'string', 'max:255'],
            'date_range'  => ['nullable', 'string', 'max:100'],
            'services'    => ['nullable', 'string', 'max:255'],
            'deliverables'=> ['nullable', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'icon_url'    => ['nullable', 'string', 'max:500'],
            'hero_image'  => ['nullable', 'image', 'max:4096'],
            'image_1'     => ['nullable', 'image', 'max:4096'],
            'image_2'     => ['nullable', 'image', 'max:4096'],
            'exec_image'  => ['nullable', 'image', 'max:4096'],
            'about_col1'  => ['nullable', 'string'],
            'about_col2'  => ['nullable', 'string'],
            'exec_col1'   => ['nullable', 'string'],
            'exec_col2'   => ['nullable', 'string'],
            'category'    => ['nullable', 'string', 'max:100'],
            'sort_order'  => ['nullable', 'integer'],
            'published'   => ['nullable', 'boolean'],
        ]);

        $data['slug']      = $data['slug'] ? Str::slug($data['slug']) : $this->uniqueSlug($request->title);
        $data['published'] = $request->has('published');
        $data['sort_order'] = $request->input('sort_order', 0);

        foreach (['hero_image', 'image_1', 'image_2', 'exec_image'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('projects', 'public');
            }
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255'],
            'tagline'     => ['nullable', 'string', 'max:500'],
            'client'      => ['nullable', 'string', 'max:255'],
            'date_range'  => ['nullable', 'string', 'max:100'],
            'services'    => ['nullable', 'string', 'max:255'],
            'deliverables'=> ['nullable', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'icon_url'    => ['nullable', 'string', 'max:500'],
            'hero_image'  => ['nullable', 'image', 'max:4096'],
            'image_1'     => ['nullable', 'image', 'max:4096'],
            'image_2'     => ['nullable', 'image', 'max:4096'],
            'exec_image'  => ['nullable', 'image', 'max:4096'],
            'about_col1'  => ['nullable', 'string'],
            'about_col2'  => ['nullable', 'string'],
            'exec_col1'   => ['nullable', 'string'],
            'exec_col2'   => ['nullable', 'string'],
            'category'    => ['nullable', 'string', 'max:100'],
            'sort_order'  => ['nullable', 'integer'],
            'published'   => ['nullable', 'boolean'],
        ]);

        $data['published']  = $request->has('published');
        $data['sort_order'] = $request->input('sort_order', 0);

        if (!empty($data['slug'])) {
            $data['slug'] = Str::slug($data['slug']);
        } else {
            unset($data['slug']);
        }

        foreach (['hero_image', 'image_1', 'image_2', 'exec_image'] as $field) {
            if ($request->hasFile($field)) {
                if ($project->$field && !str_starts_with($project->$field, 'http')) {
                    Storage::disk('public')->delete($project->$field);
                }
                $data[$field] = $request->file($field)->store('projects', 'public');
            } else {
                unset($data[$field]);
            }
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        foreach (['hero_image', 'image_1', 'image_2', 'exec_image'] as $field) {
            if ($project->$field && !str_starts_with($project->$field, 'http')) {
                Storage::disk('public')->delete($project->$field);
            }
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function uniqueSlug(string $title): string
    {
        $slug  = Str::slug($title);
        $count = Project::where('slug', 'like', $slug . '%')->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}
