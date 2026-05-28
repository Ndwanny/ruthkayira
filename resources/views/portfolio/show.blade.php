@extends('layouts.app')

@section('title', $project->title . ' - Ruth Kayira | My Perfect Stitch')
@section('meta_description', $project->tagline ?? '')

@section('content')

<div class="section pd-top-80px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">

            {{-- Header --}}
            <div class="mg-bottom-36px">
                <div class="inner-container _455px">
                    <h1 class="heading-h1-size mg-bottom-16px">{{ $project->title }}</h1>
                    <div class="inner-container _383px">
                        <p class="mg-bottom-0">{{ $project->tagline }}</p>
                    </div>
                </div>
            </div>
            
            {{-- Meta grid --}}
            <div class="mg-bottom-40px">
                <div class="w-layout-grid grid-5-columns detail">
                    <div>
                        <div class="mg-bottom-8px"><div class="text-100 bold color-neutral-800">Client</div></div>
                        <div class="text-100">{{ $project->client }}</div>
                    </div>
                    <div>
                        <div class="mg-bottom-8px"><div class="text-100 bold color-neutral-800">Date</div></div>
                        <div class="text-100">{{ $project->date_range }}</div>
                    </div>
                    <div>
                        <div class="mg-bottom-8px"><div class="text-100 bold color-neutral-800">Services</div></div>
                        <div class="text-100">{{ $project->services }}</div>
                    </div>
                    <div>
                        <div class="mg-bottom-8px"><div class="text-100 bold color-neutral-800">Deliverables</div></div>
                        <div class="text-100">{{ $project->deliverables }}</div>
                    </div>
                    @if($project->website_url)
                    <div>
                        <div class="mg-bottom-8px"><div class="text-100 bold color-neutral-800">Website</div></div>
                        <a href="{{ $project->website_url }}" target="_blank" class="link-wrapper w-inline-block">
                            <div class="link-text">Visit website</div>
                            <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Hero image --}}
            @php
                $hi = $project->hero_image;
                $heroSrc = $hi
                    ? (str_starts_with($hi, 'http') ? $hi : Storage::url($hi))
                    : 'https://images.unsplash.com/photo-1653971858474-4f2dfa7f4dc1?fm=jpg&q=60&w=1200&auto=format&fit=crop';
            @endphp
            <div class="mg-bottom-64px">
                <div class="image-wrapper border-radius-12px">
                    <img src="{{ $heroSrc }}" alt="{{ $project->title }}" class="image cover" style="min-height:400px;"/>
                </div>
            </div>

            {{-- About the Project --}}
            @if($project->about_col1 || $project->about_col2)
            <div class="mg-bottom-40px mg-bottom-10px-mbl">
                <h2 class="heading-h2-size">About the Project</h2>
                <div class="w-layout-grid grid-2-columns gap-column-80px gap-row-0px-mbl">
                    <div class="rich-text w-richtext">
                        <p>{!! $project->about_col1 !!}</p>
                    </div>
                    <div class="rich-text w-richtext">
                        <p>{!! $project->about_col2 !!}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Side-by-side images --}}
            @php
                $i1 = $project->image_1;
                $i2 = $project->image_2;
                $img1Src = $i1
                    ? (str_starts_with($i1, 'http') ? $i1 : Storage::url($i1))
                    : 'https://images.unsplash.com/photo-1720247520862-7e4b14176fa8?fm=jpg&q=60&w=800&auto=format&fit=crop';
                $img2Src = $i2
                    ? (str_starts_with($i2, 'http') ? $i2 : Storage::url($i2))
                    : 'https://images.unsplash.com/photo-1578509566163-068acd11b8e7?fm=jpg&q=60&w=800&auto=format&fit=crop';
            @endphp
            <div class="mg-bottom-64px">
                <div class="w-layout-grid grid-2-columns portfolio-about-images">
                    <div class="image-wrapper border-radius-12px">
                        <img src="{{ $img1Src }}" alt="{{ $project->title }}" class="image cover" style="min-height:280px;"/>
                    </div>
                    <div class="image-wrapper border-radius-12px">
                        <img src="{{ $img2Src }}" alt="{{ $project->title }}" class="image cover" style="min-height:280px;"/>
                    </div>
                </div>
            </div>

            {{-- Project Execution --}}
            @if($project->exec_col1 || $project->exec_col2)
            <div class="mg-bottom-40px mg-bottom-10px-mbl">
                <h2 class="heading-h2-size">Project Execution</h2>
                <div class="w-layout-grid grid-2-columns gap-column-80px gap-row-0px-mbl">
                    <div class="rich-text w-richtext">
                        <p>{!! $project->exec_col1 !!}</p>
                    </div>
                    <div class="rich-text w-richtext">
                        <p>{!! $project->exec_col2 !!}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Execution image --}}
            @php
                $ei = $project->exec_image;
                $execSrc = $ei
                    ? (str_starts_with($ei, 'http') ? $ei : Storage::url($ei))
                    : 'https://images.unsplash.com/photo-1774709440530-b6916d8c36df?fm=jpg&q=60&w=1200&auto=format&fit=crop';
            @endphp
            <div class="image-wrapper border-radius-12px">
                <img src="{{ $execSrc }}" alt="{{ $project->title }}" class="image cover" style="min-height:400px;"/>
            </div>

        </div>
    </div>
</div>

{{-- CTA --}}
<div class="section pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="card">
                <div class="card-content-pd card-cta">
                    <div class="text-center">
                        <h2 class="heading-h2-size">Interested in working with Ruth? <span class="text-no-wrap">Let's talk.</span></h2>
                        <div class="divider _24px"></div>
                        <div class="buttons-row cta">
                            <div class="mg-bottom-15px-mbp">
                                <a href="{{ route('contact') }}" class="link-wrapper mg-right-16px mg-right-0px-mbp w-inline-block">
                                    <div class="link-text">Get in touch</div>
                                    <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                                </a>
                            </div>
                            <a href="{{ route('portfolio') }}" class="link-wrapper w-inline-block">
                                <div class="link-text">View all projects</div>
                                <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
