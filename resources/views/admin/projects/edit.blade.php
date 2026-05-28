@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">← Back to Projects</a>
        @if($project->published)
            <a href="{{ route('portfolio.show', $project->slug) }}" target="_blank" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">View live ↗</a>
        @endif
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects._form')

        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-6">
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.projects.index') }}" class="btn-secondary">Cancel</a>
            </div>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project? This cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Project</button>
            </form>
        </div>
    </form>
@endsection
