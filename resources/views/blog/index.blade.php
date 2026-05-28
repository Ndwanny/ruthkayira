@extends('layouts.app')

@section('title', 'Blog - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design and championing purpose-driven entrepreneurship in Zambia and beyond.')

@section('content')
<div class="section pd-top-80px pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">

            <h1 class="heading-h1-size mg-bottom-32px">Blog Posts</h1>

            {{-- Category filters --}}
            <div class="mg-bottom-16px">
                <div class="flex-horizontal children-wrap">
                    <div class="mg-right-24px mg-bottom-24px">
                        <a href="{{ route('blog.index') }}" class="text-200 category all {{ !request('category') ? 'w--current' : '' }}">All</a>
                    </div>
                    @foreach($categories as $cat)
                    <div class="mg-right-24px mg-bottom-24px">
                        <a href="{{ route('blog.index', ['category' => $cat->slug]) }}" class="text-200 category {{ request('category') === $cat->slug ? 'w--current' : '' }}">{{ $cat->name }}</a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Posts list --}}
            <div class="mg-bottom-48px">
                @if($posts->isEmpty())
                    <p class="text-200">No posts yet. Check back soon.</p>
                @else
                    <div role="list" class="grid-1-column gap-row-36px gap-row-80px-mbl w-dyn-items">
                        @foreach($posts as $post)
                        <div role="listitem" class="w-dyn-item">
                            <a href="{{ route('blog.show', $post->slug) }}" class="link-content post w-inline-block">
                                <div class="mg-right-32px mg-right-0px-mbl mg-bottom-32px-mbl">
                                    <div class="inner-container _384px max-w-100-mbl">
                                        <div class="image-wrapper border-radius-8px post-item">
                                            @php
                                                $cover = $post->cover_image;
                                                $coverSrc = ($cover && str_starts_with($cover, 'http'))
                                                    ? $cover
                                                    : 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?fm=jpg&q=60&w=800&auto=format&fit=crop';
                                            @endphp
                                            <img src="{{ $coverSrc }}" loading="eager" alt="{{ $post->title }}" class="image cover"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-container _328px">
                                    <div class="mg-bottom-16px">
                                        <div class="flex-horizontal align-center children-wrap">
                                            <div class="text-200">{{ $post->category }}</div>
                                            <div class="text-line"></div>
                                            <div>{{ $post->published_at?->format('M j, Y') }}</div>
                                        </div>
                                    </div>
                                    <h2 class="heading-h3-size mg-bottom-16px">{{ $post->title }}</h2>
                                    <div class="flex-horizontal align-center children-wrap">
                                        <div class="text-200">{{ $post->read_time }}</div>
                                        <div class="text-200">&nbsp;min read</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if($posts->hasPages())
                        <div class="mg-top-48px">{{ $posts->links() }}</div>
                    @endif
                @endif
            </div>

            {{-- Newsletter --}}
            <div class="card">
                <div class="card-content-pd card-newsletter">
                    <div class="mg-bottom-40px">
                        <div class="text-center">
                            <h2 class="mg-bottom-4px heading-dark-mode">Stay in the Loop</h2>
                            <p>Get updates on new collections, speaking events, and behind-the-scenes stories from <span class="text-no-wrap">My Perfect Stitch.</span></p>
                        </div>
                    </div>
                    <div class="mg-bottom-0">
                        <form method="POST" action="#">
                            @csrf
                            <div class="position-relative">
                                <input class="input large button-inside w-input" maxlength="256" name="email" placeholder="Enter your email" type="email" required=""/>
                                <div class="link-form inside-input large">
                                    <div class="flex-horizontal children-wrap">
                                        <button type="submit" class="link-wrapper form w-button">Subscribe</button>
                                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
