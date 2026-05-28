@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-gray-500">{{ $projects->count() }} project{{ $projects->count() !== 1 ? 's' : '' }}</p>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary">New Project</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        @if($projects->isEmpty())
            <p class="px-6 py-12 text-sm text-gray-500 text-center">No projects yet. <a href="{{ route('admin.projects.create') }}" class="underline">Create one</a>.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 tracking-wide">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Category</th>
                        <th class="text-left px-6 py-3">Sort</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($projects as $project)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <p class="font-medium text-gray-900">{{ $project->title }}</p>
                            @if($project->tagline)
                                <p class="text-gray-400 text-xs mt-0.5 truncate max-w-xs">{{ $project->tagline }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $project->category ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-500">{{ $project->sort_order }}</td>
                        <td class="px-6 py-3">
                            @if($project->published)
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-green-50 text-green-700 border border-green-200">Published</span>
                            @else
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-3">
                                @if($project->published)
                                    <a href="{{ route('portfolio.show', $project->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-700 transition-colors text-xs">View</a>
                                @endif
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-gray-600 hover:text-gray-900 transition-colors">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
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
        @endif
    </div>
@endsection
