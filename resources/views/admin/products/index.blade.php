@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-gray-500">{{ $products->count() }} product{{ $products->count() !== 1 ? 's' : '' }}</p>
        <a href="{{ route('admin.products.create') }}" class="btn-primary">New Product</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        @if($products->isEmpty())
            <p class="px-6 py-12 text-sm text-gray-500 text-center">No products yet. <a href="{{ route('admin.products.create') }}" class="underline">Create one</a>.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[500px]">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 tracking-wide">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Price</th>
                        <th class="text-left px-6 py-3">Sort</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <p class="font-medium text-gray-900">{{ $product->title }}</p>
                            @if($product->description)
                                <p class="text-gray-400 text-xs mt-0.5 truncate max-w-xs">{{ $product->description }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-700">
                            {{ $product->formattedPrice() }}
                            @if($product->compare_price)
                                <span class="text-gray-400 line-through text-xs ml-1">{{ $product->formattedComparePrice() }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-500">{{ $product->sort_order }}</td>
                        <td class="px-6 py-3">
                            @if($product->published)
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-green-50 text-green-700 border border-green-200">Published</span>
                            @else
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-600">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-3">
                                @if($product->published)
                                    <a href="{{ route('shop.show', $product->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-700 transition-colors text-xs">View</a>
                                @endif
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-gray-600 hover:text-gray-900 transition-colors">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
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
        @endif
    </div>
@endsection
