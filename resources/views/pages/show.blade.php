@extends('layouts.app')

@section('title', $page->title . ' — ' . config('app.name'))
@section('meta_description', $page->meta_description ?? '')

@section('content')
    {{-- Hero image --}}
    @if($page->hero_image)
        <img
            src="{{ Storage::url($page->hero_image) }}"
            alt="{{ $page->title }}"
            class="w-full h-56 object-cover rounded-lg mb-8"
        >
    @endif

    <header class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900 leading-tight">{{ $page->title }}</h1>
    </header>

    <div class="text-gray-700 leading-relaxed
        [&>h2]:text-xl [&>h2]:font-semibold [&>h2]:text-gray-900 [&>h2]:mt-8 [&>h2]:mb-3
        [&>h3]:text-lg [&>h3]:font-semibold [&>h3]:text-gray-900 [&>h3]:mt-6 [&>h3]:mb-2
        [&>p]:mb-4
        [&>ul]:list-disc [&>ul]:pl-5 [&>ul]:mb-4 [&>ul>li]:mb-1
        [&>ol]:list-decimal [&>ol]:pl-5 [&>ol]:mb-4 [&>ol>li]:mb-1
        [&>blockquote]:border-l-4 [&>blockquote]:border-gray-200 [&>blockquote]:pl-4 [&>blockquote]:text-gray-500 [&>blockquote]:italic [&>blockquote]:my-4
        [&>img]:rounded-lg [&>img]:my-6 [&>img]:w-full
        [&>a]:underline [&>a]:text-gray-900 [&>a:hover]:text-gray-600">
        {!! $page->body !!}
    </div>
@endsection
