@extends('admin.layouts.app')
@section('title', 'New Category')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.blog-categories.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Categories</a>
</div>

<form action="{{ route('admin.blog-categories.store') }}" method="POST">
    @csrf
    @include('admin.blog-categories._form')
</form>
@endsection
