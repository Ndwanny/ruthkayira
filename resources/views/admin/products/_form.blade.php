{{-- Shared form fields for create/edit product --}}

<div class="grid grid-cols-3 gap-8">
    {{-- Left: main fields --}}
    <div class="col-span-2 space-y-5">

        <div>
            <label for="title" class="form-label">Title <span class="text-red-500">*</span></label>
            <input id="title" type="text" name="title" value="{{ old('title', $product->title ?? '') }}" required
                class="form-input text-base @error('title') border-red-400 @enderror" placeholder="Product title">
            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="slug" class="form-label">Slug</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $product->slug ?? '') }}"
                class="form-input @error('slug') border-red-400 @enderror" placeholder="auto-generated if empty">
            @error('slug') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="form-label">Short Description</label>
            <textarea id="description" name="description" rows="3"
                class="form-input @error('description') border-red-400 @enderror"
                placeholder="Brief product description shown in listings">{{ old('description', $product->description ?? '') }}</textarea>
            @error('description') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="price" class="form-label">Price (USD) <span class="text-red-500">*</span></label>
                <input id="price" type="number" step="0.01" min="0" name="price"
                    value="{{ old('price', $product->price ?? '') }}" required
                    class="form-input @error('price') border-red-400 @enderror" placeholder="0.00">
                @error('price') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="compare_price" class="form-label">Compare Price (USD)</label>
                <input id="compare_price" type="number" step="0.01" min="0" name="compare_price"
                    value="{{ old('compare_price', $product->compare_price ?? '') }}"
                    class="form-input @error('compare_price') border-red-400 @enderror" placeholder="Optional — shown as strikethrough">
                @error('compare_price') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="material" class="form-label">Material</label>
                <input id="material" type="text" name="material" value="{{ old('material', $product->material ?? '') }}"
                    class="form-input @error('material') border-red-400 @enderror" placeholder="e.g. Hardwood & upholstery">
                @error('material') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="dimensions" class="form-label">Dimensions</label>
                <input id="dimensions" type="text" name="dimensions" value="{{ old('dimensions', $product->dimensions ?? '') }}"
                    class="form-input @error('dimensions') border-red-400 @enderror" placeholder="e.g. 45cm × 90cm">
                @error('dimensions') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="lead_time" class="form-label">Lead Time</label>
                <input id="lead_time" type="text" name="lead_time" value="{{ old('lead_time', $product->lead_time ?? '') }}"
                    class="form-input @error('lead_time') border-red-400 @enderror" placeholder="e.g. 6–8 weeks">
                @error('lead_time') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="finish" class="form-label">Finish</label>
                <input id="finish" type="text" name="finish" value="{{ old('finish', $product->finish ?? '') }}"
                    class="form-input @error('finish') border-red-400 @enderror" placeholder="e.g. Matte Natural">
                @error('finish') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="origin" class="form-label">Origin</label>
                <input id="origin" type="text" name="origin" value="{{ old('origin', $product->origin ?? '') }}"
                    class="form-input @error('origin') border-red-400 @enderror" placeholder="e.g. Zambia">
                @error('origin') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="body" class="form-label">Full Description (Rich Text)</label>
            <textarea id="body" name="body" rows="12"
                class="form-input font-mono text-sm @error('body') border-red-400 @enderror"
                placeholder="Full product description. HTML is supported.">{{ old('body', $product->body ?? '') }}</textarea>
            <p class="text-xs text-gray-400 mt-1">HTML is supported. Use &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, etc.</p>
            @error('body') <p class="form-error">{{ $message }}</p> @enderror
        </div>

    </div>

    {{-- Right: meta & images --}}
    <div class="space-y-5">

        {{-- Publish --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Publish</h3>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="published" value="1"
                    {{ old('published', ($product->published ?? false) ? '1' : '') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-gray-900 focus:ring-gray-400">
                <span class="text-sm text-gray-700">Published</span>
            </label>
            <p class="text-xs text-gray-400 mt-1.5">Uncheck to save as draft.</p>
        </div>

        {{-- Sort Order --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input id="sort_order" type="number" name="sort_order"
                value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                class="form-input @error('sort_order') border-red-400 @enderror">
            @error('sort_order') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Main Image --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Main Image</h3>
            @isset($product)
                @if($product->main_image)
                    <div class="mb-3">
                        @if(str_starts_with($product->main_image, 'http'))
                            <img src="{{ $product->main_image }}" alt="Main" class="w-full h-28 object-cover rounded border border-gray-200">
                        @else
                            <img src="{{ Storage::url($product->main_image) }}" alt="Main" class="w-full h-28 object-cover rounded border border-gray-200">
                        @endif
                        <p class="text-xs text-gray-400 mt-1">Upload to replace.</p>
                    </div>
                @endif
            @endisset
            <input type="file" name="main_image" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            @error('main_image') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Gallery Images --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Gallery Images</h3>
            @isset($product)
                @if($product->gallery_images && count($product->gallery_images))
                    <div class="grid grid-cols-3 gap-2 mb-3">
                        @foreach($product->gallery_images as $img)
                            @if(str_starts_with($img, 'http'))
                                <img src="{{ $img }}" alt="" class="h-14 w-full object-cover rounded border border-gray-200">
                            @else
                                <img src="{{ Storage::url($img) }}" alt="" class="h-14 w-full object-cover rounded border border-gray-200">
                            @endif
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-400 mb-2">Upload new images to replace gallery.</p>
                @endif
            @endisset
            <input type="file" name="gallery_images[]" accept="image/*" multiple
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            <p class="text-xs text-gray-400 mt-1.5">Select multiple files.</p>
            @error('gallery_images') <p class="form-error">{{ $message }}</p> @enderror
        </div>

    </div>
</div>
