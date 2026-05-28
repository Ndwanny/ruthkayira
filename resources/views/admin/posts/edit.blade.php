@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.posts.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">← Back to Posts</a>
        @if($post->published)
            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">View live ↗</a>
        @endif
    </div>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.posts._form')

        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-6">
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.posts.index') }}" class="btn-secondary">Cancel</a>
            </div>
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post? This cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Post</button>
            </form>
        </div>
    </form>
@endsection
