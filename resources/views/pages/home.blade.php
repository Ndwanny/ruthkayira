@extends('layouts.app')

@section('title', 'Home - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design and championing purpose-driven entrepreneurship in Zambia and beyond.')

@section('content')

{{-- Hero --}}
<div class="section">
    <div class="container-default w-container">
        <div class="w-layout-grid grid-2-columns image-and-paragraph">
            @php $heroImg = $settings['home_hero_image']->value ?? 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?fm=jpg&q=60&w=400&auto=format&fit=crop'; @endphp
        <img src="{{ $heroImg }}" alt="Ruth Kayira" width="70" class="avatar-circle _07"/>
            <div class="inner-container _370px">
                <div class="text-center-mbl">
                    <h1 class="heading-h1-size mg-bottom-0">
                        {!! isset($settings['home_hero_title']) ? nl2br(e($settings['home_hero_title']->value)) : 'Hello, I am Ruth.<br/>Founder &amp; Creative Director.' !!}
                    </h1>
                    <p class="mg-bottom-24px">
                        {{ isset($settings['home_hero_subtitle']) ? $settings['home_hero_subtitle']->value : 'I blend African craftsmanship with bold, functional design — championing small beginnings into great enterprises through My Perfect Stitch.' }}
                    </p>
                    <a href="{{ route('contact') }}" class="link-wrapper w-inline-block">
                        <div class="link-text">{{ isset($settings['home_hero_button']) ? $settings['home_hero_button']->value : 'Contact me' }}</div>
                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- About snippet --}}
<div class="section">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="w-layout-grid grid-2-columns sidebar-right">
                <div class="inner-container _438px">
                    <div class="mg-bottom-16px">
                        <div class="w-richtext">
                            <h2>{{ isset($settings['home_about_title']) ? $settings['home_about_title']->value : 'About Ruth' }}</h2>
                            @if(isset($settings['home_about_body']) && $settings['home_about_body']->value)
                                {!! $settings['home_about_body']->value !!}
                            @else
                                <p>Ruth Kayira Mooto is a Zambian entrepreneur, public speaker, and founder of My Perfect Stitch. She made a bold leap from a stable career as a government official to build a thriving creative enterprise rooted in African craftsmanship.</p>
                                <p>Her work champions the belief that a hobby can be the start of a million-dollar business. Through My Perfect Stitch, she designs custom furniture, branded interiors, and fashion accessories that fuse bold aesthetics with functional purpose.</p>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="link-wrapper w-inline-block">
                        <div class="link-text">{{ isset($settings['home_about_link_text']) ? $settings['home_about_link_text']->value : 'More about Ruth' }}</div>
                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                    </a>
                </div>
                <div>
                    <div class="w-layout-grid grid-1-column gap-row-24px">
                        <h3 class="text-300 mg-bottom-0 title-dark-mode">Highlights</h3>
                        @for($i = 1; $i <= 3; $i++)
                            @php
                                $role = $settings["highlight_{$i}_role"]->value ?? ['Founder & Creative Director','TEDx Speaker','Government Official'][$i-1];
                                $org  = $settings["highlight_{$i}_org"]->value  ?? ['My Perfect Stitch','"What If Your Hobby Is the Start of a Million-Dollar Business?"','Zambian Public Service'][$i-1];
                                $from = $settings["highlight_{$i}_from"]->value ?? ['2018','2022','2010'][$i-1];
                                $to   = $settings["highlight_{$i}_to"]->value   ?? ['Present','Present','2018'][$i-1];
                            @endphp
                            @if($role)
                            <div>
                                <h4 class="text-100 bold mg-bottom-6px title-dark-mode">{{ $role }}</h4>
                                <div class="text-100 mg-bottom-6px">{{ $org }}</div>
                                <div class="flex-horizontal align-center children-wrap">
                                    <div class="text-100">{{ $from }}</div><div class="text-line"></div><div class="text-100">{{ $to }}</div>
                                </div>
                            </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- My Work --}}
<div class="section pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="mg-bottom-45px">
                <div class="w-layout-grid grid-2-columns title-and-button">
                    <div>
                        <h2 class="heading-h2-size">My Work</h2>
                        <p class="mg-bottom-0">A selection of custom furniture, branded interiors, and fashion pieces from My Perfect Stitch.</p>
                    </div>
                    <div>
                        <a href="{{ route('portfolio') }}" class="link-wrapper w-inline-block">
                            <div class="link-text">View all projects</div>
                            <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                        </a>
                    </div>
                </div>
            </div>

            @if($projects->isNotEmpty())
                @php $featuredProject = $projects->first(); $otherProjects = $projects->skip(1); @endphp

                {{-- Featured project --}}
                <div class="mg-bottom-24px">
                    <div role="list" class="grid-1-column gap-24px w-dyn-items">
                        <div role="listitem" class="w-dyn-item">
                            <a href="{{ route('portfolio.show', $featuredProject->slug) }}" class="card link-card project-featured w-inline-block">
                                <div class="inner-container _291px project-featured">
                                    <div class="mg-bottom-16px">
                                        @if($featuredProject->icon_url)
                                        <div class="inner-container _41px">
                                            <img src="{{ $featuredProject->icon_url }}" loading="eager" alt="{{ $featuredProject->title }}" class="image border-radius-12px width-100"/>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-100 mg-bottom-8px">{{ $featuredProject->client ?? 'My Perfect Stitch' }}</div>
                                    <h3 class="heading-h4-size mg-bottom-2px">{{ $featuredProject->title }}</h3>
                                    <p class="mg-bottom-16px">{{ $featuredProject->tagline }}</p>
                                    <div class="link-wrapper">
                                        <div class="link-text">See project</div>
                                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                                    </div>
                                </div>
                                <div class="inner-container _373px max-w-100-mbl">
                                    <div class="image-wrapper project-item featured">
                                        @php
                                            $heroSrc = $featuredProject->hero_image
                                                ? (str_starts_with($featuredProject->hero_image, 'http') ? $featuredProject->hero_image : Storage::url($featuredProject->hero_image))
                                                : 'https://images.unsplash.com/photo-1653971858474-4f2dfa7f4dc1?fm=jpg&q=60&w=800&auto=format&fit=crop';
                                        @endphp
                                        <img src="{{ $heroSrc }}" loading="eager" alt="{{ $featuredProject->title }}" class="image cover"/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Two more project cards --}}
                @if($otherProjects->isNotEmpty())
                <div role="list" class="grid-2-columns gap-24px w-dyn-items">
                    @foreach($otherProjects as $project)
                    <div role="listitem" class="w-dyn-item">
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="card link-card project w-inline-block">
                            <div class="inner-container _300px project-item">
                                @if($project->icon_url)
                                <div class="mg-bottom-16px">
                                    <div class="inner-container _41px">
                                        <img src="{{ $project->icon_url }}" loading="eager" alt="{{ $project->title }}" class="image border-radius-12px width-100"/>
                                    </div>
                                </div>
                                @endif
                                <div class="text-100 mg-bottom-8px">{{ $project->category ?? $project->client }}</div>
                                <h3 class="heading-h4-size mg-bottom-2px">{{ $project->title }}</h3>
                                <p class="mg-bottom-0">{{ $project->tagline }}</p>
                            </div>
                            <div class="image-wrapper project-item">
                                @php
                                    $imgSrc = $project->hero_image
                                        ? (str_starts_with($project->hero_image, 'http') ? $project->hero_image : Storage::url($project->hero_image))
                                        : 'https://images.unsplash.com/photo-1720247520862-7e4b14176fa8?fm=jpg&q=60&w=800&auto=format&fit=crop';
                                @endphp
                                <img src="{{ $imgSrc }}" loading="eager" alt="{{ $project->title }}" class="image cover"/>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            @endif

        </div>
    </div>
</div>

@endsection
