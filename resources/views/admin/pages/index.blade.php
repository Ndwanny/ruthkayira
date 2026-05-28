@extends('admin.layouts.app')

@section('title', 'Pages')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-gray-500">{{ $pages->total() }} page{{ $pages->total() !== 1 ? 's' : '' }}</p>
        <a href="{{ route('admin.pages.create') }}" class="btn-primary">New Page</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        @if($pages->isEmpty())
            <p class="px-6 py-12 text-sm text-gray-500 text-center">No pages yet. <a href="{{ route('admin.pages.create') }}" class="underline">Create one</a>.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[500px]">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 tracking-wide">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Slug</th>
                        <th class="text-left px-6 py-3">In Nav</th>
                        <th class="text-left px-6 py-3">Updated</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($pages as $page)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-900">{{ $page->title }}</td>
                        <td class="px-6 py-3 text-gray-500 font-mono text-xs">/page/{{ $page->slug }}</td>
                        <td class="px-6 py-3">
                            @if($page->show_in_nav)
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-blue-50 text-blue-700 border border-blue-200">Yes</span>
                            @else
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-500">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $page->updated_at->format('M j, Y') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('page.show', $page->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-700 transition-colors text-xs">View</a>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="text-gray-600 hover:text-gray-900 transition-colors">Edit</a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Delete this page?')">
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
            @if($pages->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $pages->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
