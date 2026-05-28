@extends('admin.layouts.app')

@section('title', 'New Page')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">← Back to Pages</a>
    </div>

    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.pages._form')

        <div class="mt-6 flex items-center gap-3 border-t border-gray-200 pt-6">
            <button type="submit" class="btn-primary">Create Page</button>
            <a href="{{ route('admin.pages.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
