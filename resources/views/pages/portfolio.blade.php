@extends('layouts.app')

@section('title', 'Portfolio - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'A curated collection of custom furniture, branded interiors, and fashion pieces from My Perfect Stitch.')

@section('content')

<div class="section">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">

            {{-- Header --}}
            <div class="mg-bottom-32px">
                <div class="inner-container _375px center-element">
                    <div class="text-center">
                        <h1 class="heading-h1-size mg-bottom-12px">My Work</h1>
                        <p class="mg-bottom-24px">A curated collection of custom furniture, branded interiors, and fashion pieces from <span class="text-no-wrap">My Perfect Stitch.</span></p>
                        <a href="{{ route('contact') }}" class="link-wrapper w-inline-block">
                            <div class="link-text">Work With Me</div>
                            <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                        </a>
                    </div>
                </div>
            </div>

            @if($projects->isNotEmpty())

                {{-- Featured project (first) --}}
                @php $featured = $projects->first(); $remaining = $projects->skip(1); @endphp
                <div class="mg-bottom-24px">
                    <div role="list" class="grid-1-column gap-24px w-dyn-items">
                        <div role="listitem" class="w-dyn-item">
                            <a href="{{ route('portfolio.show', $featured->slug) }}" class="card link-card project-featured w-inline-block">
                                <div class="inner-container _291px project-featured">
                                    <div class="mg-bottom-16px">
                                        @if($featured->icon_url)
                                        <div class="inner-container _41px">
                                            <img src="{{ $featured->icon_url }}" loading="eager" alt="{{ $featured->title }}" class="image border-radius-12px width-100"/>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-100 mg-bottom-8px">{{ $featured->client ?? 'My Perfect Stitch' }}</div>
                                    <h2 class="heading-h4-size mg-bottom-2px">{{ $featured->title }}</h2>
                                    <p class="mg-bottom-16px">{{ $featured->tagline }}</p>
                                    <div class="link-wrapper">
                                        <div class="link-text">See project</div>
                                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                                    </div>
                                </div>
                                <div class="inner-container _373px max-w-100-mbl">
                                    <div class="image-wrapper project-item featured">
                                        @php
                                            $heroSrc = $featured->hero_image
                                                ? (str_starts_with($featured->hero_image, 'http') ? $featured->hero_image : Storage::url($featured->hero_image))
                                                : 'https://images.unsplash.com/photo-1653971858474-4f2dfa7f4dc1?fm=jpg&q=60&w=800&auto=format&fit=crop';
                                        @endphp
                                        <img src="{{ $heroSrc }}" loading="eager" alt="{{ $featured->title }}" class="image cover"/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Grid projects (remaining) --}}
                @if($remaining->isNotEmpty())
                <div role="list" class="grid-2-columns gap-24px w-dyn-items">
                    @foreach($remaining as $project)
                    <div role="listitem" class="w-dyn-item">
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="card link-card project w-inline-block">
                            <div class="inner-container _300px project-item">
                                @if($project->icon_url)
                                <div class="mg-bottom-16px">
                                    <div class="inner-container _41px">
                                        <img src="{{ $project->icon_url }}" loading="eager" alt="" class="image border-radius-12px width-100"/>
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

            @else
                <p class="text-center text-gray-500 py-12">No projects published yet.</p>
            @endif

        </div>
    </div>
</div>

@endsection
