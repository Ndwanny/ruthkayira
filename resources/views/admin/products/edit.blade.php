@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">← Back to Products</a>
        @if($product->published)
            <a href="{{ route('shop.show', $product->slug) }}" target="_blank" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">View live ↗</a>
        @endif
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.products._form')

        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-6">
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.products.index') }}" class="btn-secondary">Cancel</a>
            </div>
            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product? This cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Product</button>
            </form>
        </div>
    </form>
@endsection
