@extends('admin.layouts.app')
@section('title', 'Blog Categories')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-sm text-gray-500 mt-0.5">{{ $categories->count() }} {{ Str::plural('category', $categories->count()) }}</p>
    </div>
    <a href="{{ route('admin.blog-categories.create') }}"
       class="inline-flex items-center gap-1.5 px-4 py-2 bg-gray-900 text-white text-sm rounded hover:bg-gray-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        New Category
    </a>
</div>

@if($categories->isEmpty())
    <div class="text-center py-16 text-gray-400">
        <p class="text-sm">No categories yet. <a href="{{ route('admin.blog-categories.create') }}" class="underline text-gray-600">Create the first one.</a></p>
    </div>
@else
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posts</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($categories as $category)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-3 font-medium text-gray-900">{{ $category->name }}</td>
                    <td class="px-5 py-3 text-gray-500 font-mono text-xs">{{ $category->slug }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $category->sort_order }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ \App\Models\Post::where('category', $category->name)->count() }}</td>
                    <td class="px-5 py-3 text-right space-x-3">
                        <a href="{{ route('admin.blog-categories.edit', $category) }}" class="text-gray-600 hover:text-gray-900 text-xs font-medium">Edit</a>
                        <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this category? Posts using it will keep the category name.')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
