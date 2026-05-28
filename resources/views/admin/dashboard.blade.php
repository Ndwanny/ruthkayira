@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Stats --}}
    <div class="grid grid-cols-4 gap-4 mb-8">
        @foreach([
            ['label' => 'Total Posts',  'value' => $totalPosts],
            ['label' => 'Published',    'value' => $publishedPosts],
            ['label' => 'Drafts',       'value' => $draftPosts],
            ['label' => 'Pages',        'value' => $totalPages],
        ] as $stat)
        <div class="bg-white border border-gray-200 rounded-lg p-5">
            <p class="text-xs text-gray-500 uppercase tracking-wide">{{ $stat['label'] }}</p>
            <p class="text-2xl font-semibold text-gray-900 mt-1">{{ $stat['value'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Quick actions --}}
    <div class="flex items-center gap-3 mb-8 flex-wrap">
        <a href="{{ route('admin.posts.create') }}" class="btn-primary">New Post</a>
        <a href="{{ route('admin.pages.create') }}" class="btn-secondary">New Page</a>
        <a href="{{ route('admin.projects.create') }}" class="btn-secondary">New Project</a>
        <a href="{{ route('admin.settings.index') }}" class="btn-secondary">Site Settings</a>
        <a href="{{ route('home') }}" target="_blank" class="btn-secondary">View Site ↗</a>
    </div>

    {{-- Recent posts --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-sm font-medium text-gray-900">Recent Posts</h2>
        </div>
        @if($recentPosts->isEmpty())
            <p class="px-6 py-8 text-sm text-gray-500 text-center">No posts yet.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 tracking-wide">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="text-left px-6 py-3">Date</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($recentPosts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-6 py-3">
                            @if($post->published)
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-green-50 text-green-700 border border-green-200">Published</span>
                            @else
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $post->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-3 text-right">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-500 hover:text-gray-900 transition-colors">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
