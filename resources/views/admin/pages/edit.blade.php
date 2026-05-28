@extends('admin.layouts.app')

@section('title', 'Edit Page')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">← Back to Pages</a>
        <a href="{{ route('page.show', $page->slug) }}" target="_blank" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">View live ↗</a>
    </div>

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($page->slug === 'about')
            @include('admin.pages._form_about')
        @elseif($page->slug === 'contact')
            @include('admin.pages._form_contact')
        @else
            @include('admin.pages._form')
        @endif

        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-6">
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.pages.index') }}" class="btn-secondary">Cancel</a>
            </div>
            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Delete this page? This cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Page</button>
            </form>
        </div>
    </form>
@endsection
