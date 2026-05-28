<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageAdminController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'body'             => ['required', 'string'],
            'hero_image'       => ['nullable', 'image', 'max:2048'],
            'meta_description' => ['nullable', 'string', 'max:160'],
            'show_in_nav'      => ['nullable', 'boolean'],
        ]);

        $data['slug']        = $this->uniqueSlug($request->title);
        $data['show_in_nav'] = $request->has('show_in_nav');

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('heroes', 'public');
        }

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $isAbout = $page->slug === 'about';

        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'body'             => [$isAbout ? 'nullable' : 'required', 'string'],
            'hero_image'       => ['nullable', 'image', 'max:4096'],
            'meta_description' => ['nullable', 'string', 'max:160'],
            'show_in_nav'      => ['nullable', 'boolean'],
            'journey_1_icon'   => ['nullable', 'image', 'max:2048'],
            'journey_2_icon'   => ['nullable', 'image', 'max:2048'],
            'journey_3_icon'   => ['nullable', 'image', 'max:2048'],
            'service_1_icon'   => ['nullable', 'image', 'max:2048'],
            'service_2_icon'   => ['nullable', 'image', 'max:2048'],
            'service_3_icon'   => ['nullable', 'image', 'max:2048'],
            'service_4_icon'   => ['nullable', 'image', 'max:2048'],
        ]);

        $data['show_in_nav'] = $request->has('show_in_nav');

        if ($request->hasFile('hero_image')) {
            if ($page->hero_image) {
                Storage::disk('public')->delete($page->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('heroes', 'public');
        }

        $isContact = $page->slug === 'contact';

        if ($isContact) {
            $contentKeys = [
                'hero_title', 'hero_subtitle',
                'social_facebook', 'social_twitter', 'social_linkedin',
                'social_instagram', 'social_tiktok', 'social_whatsapp',
                'faq_1_question', 'faq_1_answer',
                'faq_2_question', 'faq_2_answer',
                'faq_3_question', 'faq_3_answer',
                'faq_4_question', 'faq_4_answer',
            ];
            $content = $page->content ?? [];
            foreach ($contentKeys as $key) {
                $content[$key] = $request->input($key, $content[$key] ?? '');
            }
            $data['content'] = $content;
        }

        if ($isAbout) {
            $contentKeys = [
                'hero_title', 'hero_subtitle',
                'story_body',
                'recognition_1_role', 'recognition_1_org', 'recognition_1_from', 'recognition_1_to',
                'recognition_2_role', 'recognition_2_org', 'recognition_2_from', 'recognition_2_to',
                'recognition_3_role', 'recognition_3_org', 'recognition_3_from', 'recognition_3_to',
                'journey_intro',
                'journey_1_org', 'journey_1_title', 'journey_1_from', 'journey_1_to', 'journey_1_desc',
                'journey_2_org', 'journey_2_title', 'journey_2_from', 'journey_2_to', 'journey_2_desc',
                'journey_3_org', 'journey_3_title', 'journey_3_from', 'journey_3_to', 'journey_3_desc',
                'service_1_title', 'service_1_desc',
                'service_2_title', 'service_2_desc',
                'service_3_title', 'service_3_desc',
                'service_4_title', 'service_4_desc',
            ];
            $content = $page->content ?? [];
            foreach ($contentKeys as $key) {
                $content[$key] = $request->input($key, $content[$key] ?? '');
            }

            // Handle journey and service icon uploads
            foreach (['journey_1_icon','journey_2_icon','journey_3_icon',
                      'service_1_icon','service_2_icon','service_3_icon','service_4_icon'] as $field) {
                if ($request->hasFile($field)) {
                    if (!empty($content[$field]) && !str_starts_with($content[$field], 'http')) {
                        Storage::disk('public')->delete($content[$field]);
                    }
                    $content[$field] = $request->file($field)->store('about-icons', 'public');
                }
            }

            $data['content'] = $content;
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        if ($page->hero_image) {
            Storage::disk('public')->delete($page->hero_image);
        }
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted.');
    }

    private function uniqueSlug(string $title): string
    {
        $slug  = Str::slug($title);
        $count = Page::where('slug', 'like', $slug . '%')->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}
