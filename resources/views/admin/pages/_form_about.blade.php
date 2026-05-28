@php $c = $page->content ?? []; @endphp

<div class="space-y-8">

    {{-- Page settings sidebar (shared) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div>
                <label class="form-label">Page Title</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" required class="form-input text-base">
            </div>
        </div>
        <div class="space-y-4">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Settings</h3>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="show_in_nav" value="1" {{ old('show_in_nav', $page->show_in_nav ? '1' : '') ? 'checked' : '' }} class="rounded border-gray-300 text-gray-900 focus:ring-gray-400">
                    <span class="text-sm text-gray-700">Show in navigation</span>
                </label>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-3">SEO</h3>
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="3" maxlength="160" class="form-input text-xs" placeholder="Max 160 chars">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Hero --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">Hero Section</h2></div>
        <div class="px-6 py-5 space-y-4">
            <div>
                <label class="form-label">Heading</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $c['hero_title'] ?? 'About Ruth') }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Subtitle</label>
                <textarea name="hero_subtitle" rows="2" class="form-input">{{ old('hero_subtitle', $c['hero_subtitle'] ?? 'Zambian entrepreneur, public speaker, and founder of My Perfect Stitch — transforming African craftsmanship into bold, functional design and inspiring a generation of purpose-driven entrepreneurs.') }}</textarea>
            </div>
            <div>
                <label class="form-label">Hero Photo</label>
                @if($page->hero_image)
                    @php
                        $heroUrl = str_starts_with($page->hero_image, 'http')
                            ? $page->hero_image
                            : \Storage::disk('s3')->temporaryUrl($page->hero_image, now()->addDays(7));
                    @endphp
                    <div class="mb-2">
                        <img src="{{ $heroUrl }}" alt="Hero" class="h-32 w-auto rounded border border-gray-200 object-cover">
                        <p class="text-xs text-gray-400 mt-1">Upload a new image to replace.</p>
                    </div>
                @else
                    <div class="mb-2">
                        <img src="{{ asset('images/about.jpg') }}" alt="Current hero" class="h-32 w-auto rounded border border-gray-200 object-cover">
                        <p class="text-xs text-gray-400 mt-1">Current default image. Upload to replace.</p>
                    </div>
                @endif
                <input type="file" name="hero_image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            </div>
        </div>
    </div>

    {{-- My Story --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">My Story</h2></div>
        <div class="px-6 py-5">
            <label class="form-label">Story Body (HTML allowed)</label>
            <textarea name="story_body" rows="8" class="form-input font-mono text-sm">{{ old('story_body', $c['story_body'] ?? '<p>Ruth Kayira Mooto began her career in the Zambian public service, building a stable and respected professional life. But beneath the surface, a creative passion was quietly growing — one that would change the course of her life entirely.</p>
<p>She founded My Perfect Stitch as a way to channel her love for design and craftsmanship. What started as a hobby evolved into a full-scale design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African heritage.</p>
<p>Today, Ruth is one of Zambia\'s boldest entrepreneurial voices. Her TEDx talk, "What If Your Hobby Is the Start of a Million-Dollar Business?", has inspired thousands to champion their own small beginnings.</p>') }}</textarea>
        </div>
    </div>

    {{-- Recognition sidebar --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">Recognition (Story Sidebar)</h2></div>
        <div class="px-6 py-5 space-y-6">
            @for($i = 1; $i <= 3; $i++)
            @php
                $defaults = [
                    1 => ['role'=>'Fashion & Accessories','org'=>'TEDx Talk, 2022','from'=>'2022','to'=>'Present'],
                    2 => ['role'=>'Entrepreneur Award','org'=>'Zambia Creative Industries','from'=>'2021','to'=>'Present'],
                    3 => ['role'=>'Business Studies','org'=>'University of Zambia','from'=>'2005','to'=>'2009'],
                ];
            @endphp
            <div class="border border-gray-100 rounded-lg p-4 space-y-3">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Recognition {{ $i }}</p>
                <div>
                    <label class="form-label">Role / Title</label>
                    <input type="text" name="recognition_{{ $i }}_role" value="{{ old('recognition_'.$i.'_role', $c['recognition_'.$i.'_role'] ?? $defaults[$i]['role']) }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">Organisation / Description</label>
                    <input type="text" name="recognition_{{ $i }}_org" value="{{ old('recognition_'.$i.'_org', $c['recognition_'.$i.'_org'] ?? $defaults[$i]['org']) }}" class="form-input">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">From</label>
                        <input type="text" name="recognition_{{ $i }}_from" value="{{ old('recognition_'.$i.'_from', $c['recognition_'.$i.'_from'] ?? $defaults[$i]['from']) }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">To</label>
                        <input type="text" name="recognition_{{ $i }}_to" value="{{ old('recognition_'.$i.'_to', $c['recognition_'.$i.'_to'] ?? $defaults[$i]['to']) }}" class="form-input">
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- My Journey --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">My Journey</h2></div>
        <div class="px-6 py-5 space-y-6">
            <div>
                <label class="form-label">Section Subtitle</label>
                <input type="text" name="journey_intro" value="{{ old('journey_intro', $c['journey_intro'] ?? 'From public service to creative entrepreneurship — a path built on courage, creativity, and community.') }}" class="form-input">
            </div>
            @php
                $journeyDefaults = [
                    1 => ['org'=>'My Perfect Stitch','title'=>'Founder & Creative Director','from'=>'2018','to'=>'Present','desc'=>'Founded and scaled My Perfect Stitch into a design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African craftsmanship.'],
                    2 => ['org'=>'Zambian Public Service','title'=>'Government Official','from'=>'2010','to'=>'2018','desc'=>'Served in the Zambian public service, developing leadership and administrative skills before transitioning to full-time entrepreneurship. This foundation shaped her disciplined approach to business.'],
                    3 => ['org'=>'TEDx & Public Speaking','title'=>'Speaker & Mentor','from'=>'2015','to'=>'Present','desc'=>'Delivered a TEDx talk on entrepreneurship and purpose-driven business. Mentors young African entrepreneurs, advocating for creativity, community, and the courage to start small.'],
                ];
                $journeyIconDefaults = [
                    1 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/655b883b3ff843c7a906bf3d_business-logo-simplematic-x-webflow-template.svg',
                    2 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/655b883bdb49c270d383cfa4_company-logo-simplematic-x-webflow-template.svg',
                    3 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/655b883b2e1fc425d3e9263f_agency-logo-simplematic-x-webflow-template.svg',
                ];
            @endphp
            @for($i = 1; $i <= 3; $i++)
            <div class="border border-gray-100 rounded-lg p-4 space-y-3">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Journey Entry {{ $i }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Organisation</label>
                        <input type="text" name="journey_{{ $i }}_org" value="{{ old('journey_'.$i.'_org', $c['journey_'.$i.'_org'] ?? $journeyDefaults[$i]['org']) }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Title / Role</label>
                        <input type="text" name="journey_{{ $i }}_title" value="{{ old('journey_'.$i.'_title', $c['journey_'.$i.'_title'] ?? $journeyDefaults[$i]['title']) }}" class="form-input">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">From</label>
                        <input type="text" name="journey_{{ $i }}_from" value="{{ old('journey_'.$i.'_from', $c['journey_'.$i.'_from'] ?? $journeyDefaults[$i]['from']) }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">To</label>
                        <input type="text" name="journey_{{ $i }}_to" value="{{ old('journey_'.$i.'_to', $c['journey_'.$i.'_to'] ?? $journeyDefaults[$i]['to']) }}" class="form-input">
                    </div>
                </div>
                <div>
                    <label class="form-label">Description</label>
                    <textarea name="journey_{{ $i }}_desc" rows="3" class="form-input">{{ old('journey_'.$i.'_desc', $c['journey_'.$i.'_desc'] ?? $journeyDefaults[$i]['desc']) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Card Icon / Logo</label>
                    @php $iconPath = $c['journey_'.$i.'_icon'] ?? ''; @endphp
                    @if($iconPath)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ str_starts_with($iconPath,'http') ? $iconPath : Storage::url($iconPath) }}" alt="Icon" class="h-10 w-10 object-contain rounded border border-gray-200 bg-gray-50 p-1">
                            <p class="text-xs text-gray-400">Upload to replace.</p>
                        </div>
                    @else
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ $journeyIconDefaults[$i] }}" alt="Default icon" class="h-10 w-10 object-contain rounded border border-gray-200 bg-gray-50 p-1">
                            <p class="text-xs text-gray-400">Current default. Upload to replace.</p>
                        </div>
                    @endif
                    <input type="file" name="journey_{{ $i }}_icon" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- What I Do --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">What I Do (4 Service Cards)</h2></div>
        <div class="px-6 py-5 space-y-4">
            @php
                $serviceDefaults = [
                    1 => ['title'=>'Branded Interiors','desc'=>'Designing custom spaces for corporate and residential clients — bold, identity-driven environments rooted in African aesthetics.'],
                    2 => ['title'=>'Custom Furniture','desc'=>'Bespoke, high-quality furniture pieces incorporating local craftsmanship and modern design.'],
                    3 => ['title'=>'Fashion & Accessories','desc'=>'High-quality bags and textile-based products rooted in African heritage and contemporary style.'],
                    4 => ['title'=>'Manufacturing & Scale','desc'=>'Operating as a design and manufacturing hub — moving beyond handmade to a scalable enterprise model.'],
                ];
                $serviceIconDefaults = [
                    1 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61eadee42b9a7c4e15e11304_icon-1-skills-simplematic-template.svg',
                    2 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61eadee4ce181defb2089a76_icon-2-skills-simplematic-template.svg',
                    3 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61eadee44609023788f19ebb_icon-3-skills-simplematic-template.svg',
                    4 => 'https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61eadee44609025b73f19eba_icon-4-skills-simplematic-template.svg',
                ];
            @endphp
            @for($i = 1; $i <= 4; $i++)
            <div class="border border-gray-100 rounded-lg p-4 space-y-3">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Service {{ $i }}</p>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="service_{{ $i }}_title" value="{{ old('service_'.$i.'_title', $c['service_'.$i.'_title'] ?? $serviceDefaults[$i]['title']) }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">Description</label>
                    <textarea name="service_{{ $i }}_desc" rows="2" class="form-input">{{ old('service_'.$i.'_desc', $c['service_'.$i.'_desc'] ?? $serviceDefaults[$i]['desc']) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Card Icon</label>
                    @php $sIconPath = $c['service_'.$i.'_icon'] ?? ''; @endphp
                    @if($sIconPath)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ str_starts_with($sIconPath,'http') ? $sIconPath : Storage::url($sIconPath) }}" alt="Icon" class="h-10 w-10 object-contain rounded border border-gray-200 bg-gray-50 p-1">
                            <p class="text-xs text-gray-400">Upload to replace.</p>
                        </div>
                    @else
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ $serviceIconDefaults[$i] }}" alt="Default icon" class="h-10 w-10 object-contain rounded border border-gray-200 bg-gray-50 p-1">
                            <p class="text-xs text-gray-400">Current default. Upload to replace.</p>
                        </div>
                    @endif
                    <input type="file" name="service_{{ $i }}_icon" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
                </div>
            </div>
            @endfor
        </div>
    </div>

</div>
