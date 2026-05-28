@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div class="space-y-8">

            {{-- Home Hero --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-sm font-medium text-gray-900">Home — Hero Section</h2>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label class="form-label">Hero Title</label>
                        <input type="text" name="home_hero_title" value="{{ old('home_hero_title', $settings['home_hero_title']->value ?? '') }}"
                            class="form-input" placeholder="Hello, I am Ruth.">
                    </div>
                    <div>
                        <label class="form-label">Hero Subtitle</label>
                        <textarea name="home_hero_subtitle" rows="2" class="form-input" placeholder="I blend African craftsmanship...">{{ old('home_hero_subtitle', $settings['home_hero_subtitle']->value ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">Hero Button Text</label>
                        <input type="text" name="home_hero_button" value="{{ old('home_hero_button', $settings['home_hero_button']->value ?? '') }}"
                            class="form-input" placeholder="Contact me">
                    </div>
                </div>
            </div>

            {{-- Home About --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-sm font-medium text-gray-900">Home — About Snippet</h2>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label class="form-label">About Title</label>
                        <input type="text" name="home_about_title" value="{{ old('home_about_title', $settings['home_about_title']->value ?? '') }}"
                            class="form-input" placeholder="About Ruth">
                    </div>
                    <div>
                        <label class="form-label">About Body (HTML allowed)</label>
                        <textarea name="home_about_body" rows="6" class="form-input font-mono text-sm"
                            placeholder="<p>Ruth Kayira Mooto is...</p>">{{ old('home_about_body', $settings['home_about_body']->value ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">About Link Text</label>
                        <input type="text" name="home_about_link_text" value="{{ old('home_about_link_text', $settings['home_about_link_text']->value ?? '') }}"
                            class="form-input" placeholder="More about Ruth">
                    </div>
                </div>
            </div>

            {{-- About Hero --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-sm font-medium text-gray-900">About Page — Hero</h2>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label class="form-label">About Hero Title</label>
                        <input type="text" name="about_hero_title" value="{{ old('about_hero_title', $settings['about_hero_title']->value ?? '') }}"
                            class="form-input" placeholder="About Ruth">
                    </div>
                    <div>
                        <label class="form-label">About Hero Subtitle</label>
                        <textarea name="about_hero_subtitle" rows="2" class="form-input" placeholder="Zambian entrepreneur...">{{ old('about_hero_subtitle', $settings['about_hero_subtitle']->value ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- About Story --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-sm font-medium text-gray-900">About Page — My Story</h2>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label class="form-label">Story Title</label>
                        <input type="text" name="about_story_title" value="{{ old('about_story_title', $settings['about_story_title']->value ?? '') }}"
                            class="form-input" placeholder="My Story">
                    </div>
                    <div>
                        <label class="form-label">Story Body (HTML allowed)</label>
                        <textarea name="about_story_body" rows="8" class="form-input font-mono text-sm"
                            placeholder="<p>Ruth Kayira Mooto began...</p>">{{ old('about_story_body', $settings['about_story_body']->value ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Highlights --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-sm font-medium text-gray-900">Home — Highlights</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Three career highlights shown beside the about snippet on the home page.</p>
                </div>
                <div class="px-6 py-5 space-y-6">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="border border-gray-100 rounded-lg p-4 space-y-3">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Highlight {{ $i }}</p>
                        <div>
                            <label class="form-label">Role / Title</label>
                            <input type="text" name="highlight_{{ $i }}_role"
                                value="{{ old('highlight_'.$i.'_role', $settings['highlight_'.$i.'_role']->value ?? '') }}"
                                class="form-input"
                                placeholder="{{ ['Founder & Creative Director','TEDx Speaker','Government Official'][$i-1] }}">
                        </div>
                        <div>
                            <label class="form-label">Organisation / Description</label>
                            <input type="text" name="highlight_{{ $i }}_org"
                                value="{{ old('highlight_'.$i.'_org', $settings['highlight_'.$i.'_org']->value ?? '') }}"
                                class="form-input"
                                placeholder="{{ ['My Perfect Stitch','"What If Your Hobby Is the Start of a Million-Dollar Business?"','Zambian Public Service'][$i-1] }}">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="form-label">From</label>
                                <input type="text" name="highlight_{{ $i }}_from"
                                    value="{{ old('highlight_'.$i.'_from', $settings['highlight_'.$i.'_from']->value ?? '') }}"
                                    class="form-input"
                                    placeholder="{{ ['2018','2022','2010'][$i-1] }}">
                            </div>
                            <div>
                                <label class="form-label">To</label>
                                <input type="text" name="highlight_{{ $i }}_to"
                                    value="{{ old('highlight_'.$i.'_to', $settings['highlight_'.$i.'_to']->value ?? '') }}"
                                    class="form-input"
                                    placeholder="{{ ['Present','Present','2018'][$i-1] }}">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center gap-3 border-t border-gray-200 pt-6">
            <button type="submit" class="btn-primary">Save Settings</button>
        </div>
    </form>
@endsection
