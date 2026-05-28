@extends('layouts.app')

@section('title', 'About - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design and championing purpose-driven entrepreneurship in Zambia and beyond.')

@php
    use Illuminate\Support\Facades\Storage;
    $c = $aboutPage->content ?? [];
    $get = fn(string $key, string $default) => $c[$key] ?? $default;
@endphp

@section('content')

{{-- Header --}}
<div class="section pd-bottom-0px pd-top-80px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="mg-bottom-32px">
                <div class="w-layout-grid grid-2-columns title-and-button _1-col-mbl">
                    <div class="inner-container _456px">
                        <h1 class="heading-h1-size">{{ $get('hero_title', 'About Ruth') }}</h1>
                        <p class="mg-bottom-0">{{ $get('hero_subtitle', 'Zambian entrepreneur, public speaker, and founder of My Perfect Stitch — transforming African craftsmanship into bold, functional design and inspiring a generation of purpose-driven entrepreneurs.') }}</p>
                    </div>
                    <a href="{{ route('contact') }}" class="link-wrapper w-inline-block">
                        <div class="link-text">Contact me</div>
                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                    </a>
                </div>
            </div>
            <div class="image-wrapper border-radius-12px">
                @if($aboutPage?->hero_image)
                    <img src="{{ Storage::url($aboutPage->hero_image) }}" loading="eager" alt="About Ruth Kayira" class="image cover"/>
                @else
                    <img src="{{ asset('images/about.jpg') }}" loading="eager" alt="About Ruth Kayira" class="image cover"/>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- My Story --}}
<div class="section">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="w-layout-grid grid-2-columns sidebar-right">
                <div class="inner-container _456px">
                    <div class="w-richtext">
                        <h2>My Story</h2>
                        {!! $get('story_body', '<p>Ruth Kayira Mooto began her career in the Zambian public service, building a stable and respected professional life. But beneath the surface, a creative passion was quietly growing — one that would change the course of her life entirely.</p><p>She founded My Perfect Stitch as a way to channel her love for design and craftsmanship. What started as a hobby evolved into a full-scale design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African heritage.</p><p>Today, Ruth is one of Zambia\'s boldest entrepreneurial voices. Her TEDx talk, "What If Your Hobby Is the Start of a Million-Dollar Business?", has inspired thousands to champion their own small beginnings.</p>') !!}
                    </div>
                </div>
                <div>
                    <div class="w-layout-grid grid-1-column gap-row-24px">
                        <h3 class="text-300 mg-bottom-0 title-dark-mode">Recognition</h3>
                        @php
                            $recDefaults = [
                                1 => ['role'=>'Fashion & Accessories','org'=>'TEDx Talk, 2022','from'=>'2022','to'=>'Present'],
                                2 => ['role'=>'Entrepreneur Award','org'=>'Zambia Creative Industries','from'=>'2021','to'=>'Present'],
                                3 => ['role'=>'Business Studies','org'=>'University of Zambia','from'=>'2005','to'=>'2009'],
                            ];
                        @endphp
                        @for($i = 1; $i <= 3; $i++)
                        @php $rd = $recDefaults[$i]; @endphp
                        <div>
                            <h4 class="text-100 bold mg-bottom-6px title-dark-mode">{{ $get('recognition_'.$i.'_role', $rd['role']) }}</h4>
                            <div class="text-100 mg-bottom-6px">{{ $get('recognition_'.$i.'_org', $rd['org']) }}</div>
                            <div class="flex-horizontal align-center children-wrap">
                                <div class="text-100">{{ $get('recognition_'.$i.'_from', $rd['from']) }}</div><div class="text-line"></div><div class="text-100">{{ $get('recognition_'.$i.'_to', $rd['to']) }}</div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- My Journey --}}
<div class="section">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="mg-bottom-32px">
                <div class="w-layout-grid grid-2-columns title-and-paragraph">
                    <h2 class="heading-h2-size">My Journey</h2>
                    <p class="mg-bottom-0">{{ $get('journey_intro', 'From public service to creative entrepreneurship — a path built on courage, creativity, and community.') }}</p>
                </div>
            </div>
            <div class="w-layout-grid grid-1-column gap-row-24px">
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
                    $journeyIcons = array_map(function($i) use ($c, $journeyIconDefaults) {
                        $p = $c['journey_'.$i.'_icon'] ?? '';
                        if (!$p) return $journeyIconDefaults[$i];
                        return str_starts_with($p, 'http') ? $p : \Illuminate\Support\Facades\Storage::url($p);
                    }, [1=>1,2=>2,3=>3]);
                @endphp
                @for($i = 1; $i <= 3; $i++)
                @php $jd = $journeyDefaults[$i]; @endphp
                <div class="card">
                    <div class="card-content-pd card-info-top">
                        <div class="w-layout-grid grid-2-columns title-and-button">
                            <div class="flex-horizontal align-center children-wrap">
                                <div class="inner-container _36px mg-right-14px">
                                    <img src="{{ $journeyIcons[$i] }}" loading="eager" alt="{{ $get('journey_'.$i.'_org', $jd['org']) }}" class="image border-radius-8px width-100"/>
                                </div>
                                <h3 class="heading-h4-size mg-bottom-0">{{ $get('journey_'.$i.'_org', $jd['org']) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-content-pd card-info-bottom">
                        <div class="w-layout-grid grid-2-columns card-info">
                            <div class="w-layout-grid grid-1-column gap-row-32px">
                                <div>
                                    <div class="mg-bottom-12px"><div class="text-200 medium color-neutral-800">Title</div></div>
                                    <div class="text-100">{{ $get('journey_'.$i.'_title', $jd['title']) }}</div>
                                </div>
                                <div>
                                    <div class="mg-bottom-12px"><div class="text-200 medium color-neutral-800">Period</div></div>
                                    <div class="flex-horizontal align-center children-wrap">
                                        <div class="text-100">{{ $get('journey_'.$i.'_from', $jd['from']) }}</div><div class="text-line"></div><div class="text-100">{{ $get('journey_'.$i.'_to', $jd['to']) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mg-bottom-10px"><div class="text-200 medium color-neutral-800">Description</div></div>
                                <p class="mg-bottom-0">{{ $get('journey_'.$i.'_desc', $jd['desc']) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- What I Do --}}
<div class="section">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <h2 class="heading-h2-size mg-bottom-24px">What I Do</h2>
            <div class="w-layout-grid grid-2-columns gap-24px">
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
                    $serviceIcons = array_map(function($i) use ($c, $serviceIconDefaults) {
                        $p = $c['service_'.$i.'_icon'] ?? '';
                        if (!$p) return $serviceIconDefaults[$i];
                        return str_starts_with($p, 'http') ? $p : \Illuminate\Support\Facades\Storage::url($p);
                    }, [1=>1,2=>2,3=>3,4=>4]);
                @endphp
                @for($i = 1; $i <= 4; $i++)
                @php $sd = $serviceDefaults[$i]; @endphp
                <div class="card"><div class="card-content-pd card-skills">
                    <div class="inner-container _41px mg-bottom-16px"><img src="{{ $serviceIcons[$i] }}" loading="eager" alt="" class="image border-radius-10px"/></div>
                    <h3 class="heading-h3-size mg-bottom-8px">{{ $get('service_'.$i.'_title', $sd['title']) }}</h3>
                    <p class="mg-bottom-0">{{ $get('service_'.$i.'_desc', $sd['desc']) }}</p>
                </div></div>
                @endfor
            </div>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- Social media --}}
<div class="section">
    <div class="container-default w-container">
        <h2 class="heading-h2-size mg-bottom-32px">Follow me on social media</h2>
        <div class="w-layout-grid grid-4-columns gap-24px _4-col-tablet">
            <a href="https://www.facebook.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE809;</div></div><div>Facebook</div></div></div></div></a>
            <a href="https://twitter.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon icon-size-16px">&#xE80A;</div></div><div>Twitter</div></div></div></div></a>
            <a href="https://www.linkedin.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80B;</div></div><div>LinkedIn</div></div></div></div></a>
            <a href="https://www.instagram.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80D;</div></div><div>Instagram</div></div></div></div></a>
            <a href="https://www.tiktok.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><svg width="14" height="14" viewBox="0 0 24 27" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display:inline-block;vertical-align:middle;"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.75a4.85 4.85 0 0 1-1.01-.06z"/></svg></div><div>TikTok</div></div></div></div></a>
            <a href="https://www.whatsapp.com/" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80E;</div></div><div>WhatsApp</div></div></div></div></a>
        </div>
    </div>
</div>

@endsection
