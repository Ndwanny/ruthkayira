{{-- Shared form for create/edit blog category --}}
<div class="max-w-lg space-y-5">

    <div>
        <label for="name" class="form-label">Name <span class="text-red-500">*</span></label>
        <input id="name" type="text" name="name"
               value="{{ old('name', $category->name ?? '') }}"
               required class="form-input @error('name') border-red-400 @enderror"
               placeholder="e.g. Corporate">
        @error('name') <p class="form-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="slug" class="form-label">Slug</label>
        <input id="slug" type="text" name="slug"
               value="{{ old('slug', $category->slug ?? '') }}"
               class="form-input @error('slug') border-red-400 @enderror"
               placeholder="Leave blank to auto-generate from name">
        <p class="text-xs text-gray-400 mt-1">Used in URL filters. Auto-generated if left blank.</p>
        @error('slug') <p class="form-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="form-label">Sort Order</label>
        <input id="sort_order" type="number" name="sort_order" min="0"
               value="{{ old('sort_order', $category->sort_order ?? 0) }}"
               class="form-input w-32 @error('sort_order') border-red-400 @enderror">
        <p class="text-xs text-gray-400 mt-1">Lower numbers appear first.</p>
        @error('sort_order') <p class="form-error">{{ $message }}</p> @enderror
    </div>

    <div class="pt-2">
        <button type="submit" class="px-5 py-2 bg-gray-900 text-white text-sm rounded hover:bg-gray-700 transition-colors">
            Save Category
        </button>
        <a href="{{ route('admin.blog-categories.index') }}" class="ml-3 text-sm text-gray-500 hover:text-gray-700">Cancel</a>
    </div>

</div>
