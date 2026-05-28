@extends('admin.layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-gray-500">{{ $posts->total() }} post{{ $posts->total() !== 1 ? 's' : '' }}</p>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary">New Post</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        @if($posts->isEmpty())
            <p class="px-6 py-12 text-sm text-gray-500 text-center">No posts yet. <a href="{{ route('admin.posts.create') }}" class="underline">Create one</a>.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[600px]">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 tracking-wide">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="text-left px-6 py-3">Published</th>
                        <th class="text-left px-6 py-3">Created</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <p class="font-medium text-gray-900">{{ $post->title }}</p>
                            @if($post->excerpt)
                                <p class="text-gray-400 text-xs mt-0.5 truncate max-w-xs">{{ $post->excerpt }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            @if($post->published)
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-green-50 text-green-700 border border-green-200">Published</span>
                            @else
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-500">
                            {{ $post->published_at ? $post->published_at->format('M j, Y') : '—' }}
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $post->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-3">
                                @if($post->published)
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-700 transition-colors text-xs">View</a>
                                @endif
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-600 hover:text-gray-900 transition-colors">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            @if($posts->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
