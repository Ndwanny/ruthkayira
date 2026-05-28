@extends('layouts.app')

@section('title', $post->title . ' - Ruth Kayira | My Perfect Stitch')
@section('meta_description', $post->excerpt ?: 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design.')

@section('content')
<div class="section pd-top-80px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">

            {{-- Post header --}}
            <div class="mg-bottom-40px">
                <div class="inner-container _700px center-element">
                    <div class="text-center">
                        <div class="mg-bottom-24px">
                            <div class="flex-horizontal align-center justify-center">
                                <span class="text-200">{{ $post->category }}</span>
                                <div class="text-line large"></div>
                                <div class="text-200">{{ $post->published_at->format('M j, Y') }}</div>
                            </div>
                        </div>
                        <h1 class="heading-h1-size">{{ $post->title }}</h1>
                    </div>
                </div>
            </div>

            {{-- Cover image --}}
            @php
                $cover = $post->cover_image;
                $coverSrc = ($cover && str_starts_with($cover, 'http'))
                    ? $cover
                    : 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?fm=jpg&q=60&w=1200&auto=format&fit=crop';
            @endphp
            <div class="mg-bottom-64px">
                <div class="image-wrapper border-radius-16px">
                    <img src="{{ $coverSrc }}" loading="eager" alt="{{ $post->title }}" class="image cover"/>
                </div>
            </div>

            {{-- Body --}}
            <div class="rich-text w-richtext">
                {!! $post->body !!}
            </div>

        </div>
    </div>
</div>

<div class="divider-wrapper">
    <div class="container-default w-container">
        <div class="divider _0px"></div>
    </div>
</div>

{{-- Related posts --}}
@if($relatedPosts->isNotEmpty())
<div class="section pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <h2 class="heading-h2-size mg-bottom-24px">Related Posts</h2>
            <div role="list" class="grid-1-column gap-row-36px gap-row-80px-mbl w-dyn-items">
                @foreach($relatedPosts as $related)
                <div role="listitem" class="w-dyn-item">
                    <a href="{{ route('blog.show', $related->slug) }}" class="link-content post w-inline-block">
                        <div class="mg-right-32px mg-right-0px-mbl mg-bottom-32px-mbl">
                            <div class="inner-container _384px max-w-100-mbl">
                                <div class="image-wrapper border-radius-8px post-item">
                                    @php
                                        $rc = $related->cover_image;
                                        $rSrc = ($rc && str_starts_with($rc, 'http'))
                                            ? $rc
                                            : 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?fm=jpg&q=60&w=800&auto=format&fit=crop';
                                    @endphp
                                    <img src="{{ $rSrc }}" loading="eager" alt="{{ $related->title }}" class="image cover"/>
                                </div>
                            </div>
                        </div>
                        <div class="inner-container _328px">
                            <div class="mg-bottom-16px">
                                <div class="flex-horizontal align-center children-wrap">
                                    <div class="text-200">{{ $related->category }}</div>
                                    <div class="text-line"></div>
                                    <div>{{ $related->published_at->format('M j, Y') }}</div>
                                </div>
                            </div>
                            <h2 class="heading-h3-size mg-bottom-16px">{{ $related->title }}</h2>
                            <div class="flex-horizontal align-center children-wrap">
                                <div class="text-200">{{ $related->read_time }}</div>
                                <div class="text-200">&nbsp;min read</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection
