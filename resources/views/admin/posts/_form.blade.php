{{-- Shared form fields for create/edit post --}}

<div class="grid grid-cols-3 gap-8">
    {{-- Left: main fields --}}
    <div class="col-span-2 space-y-5">
        <div>
            <label for="title" class="form-label">Title <span class="text-red-500">*</span></label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $post->title ?? '') }}"
                required
                class="form-input text-base @error('title') border-red-400 @enderror"
                placeholder="Post title"
            >
            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="category" class="form-label">Category <span class="text-red-500">*</span></label>
            <select id="category" name="category" required class="form-input @error('category') border-red-400 @enderror">
                <option value="">— Select category —</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->name }}" {{ old('category', $post->category ?? '') === $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category') <p class="form-error">{{ $message }}</p> @enderror
            <p class="text-xs text-gray-400 mt-1">
                <a href="{{ route('admin.blog-categories.index') }}" class="underline">Manage categories</a>
            </p>
        </div>

        <div>
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea
                id="excerpt"
                name="excerpt"
                rows="2"
                class="form-input @error('excerpt') border-red-400 @enderror"
                placeholder="Short summary shown in listings (optional)"
            >{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            @error('excerpt') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="body" class="form-label">Content <span class="text-red-500">*</span></label>
            <textarea
                id="body"
                name="body"
                rows="18"
                required
                class="form-input font-mono text-sm @error('body') border-red-400 @enderror"
                placeholder="Write your post content here. HTML is supported."
            >{{ old('body', $post->body ?? '') }}</textarea>
            <p class="text-xs text-gray-400 mt-1">HTML is supported. Use &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;img&gt;, etc.</p>
            @error('body') <p class="form-error">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Right: meta --}}
    <div class="space-y-5">
        {{-- Publish --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Publish</h3>
            <label class="flex items-center gap-2 cursor-pointer">
                <input
                    type="checkbox"
                    name="published"
                    value="1"
                    {{ old('published', ($post->published ?? false) ? '1' : '') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-gray-900 focus:ring-gray-400"
                >
                <span class="text-sm text-gray-700">Published</span>
            </label>
            <p class="text-xs text-gray-400 mt-1.5">Uncheck to save as draft.</p>

            @isset($post)
                @if($post->published_at)
                    <p class="text-xs text-gray-400 mt-2">Published {{ $post->published_at->format('M j, Y') }}</p>
                @endif
            @endisset
        </div>

        {{-- Cover image --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Cover Image</h3>

            @isset($post)
                @if($post->cover_image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($post->cover_image) }}" alt="Cover" class="w-full h-32 object-cover rounded border border-gray-200">
                        <p class="text-xs text-gray-400 mt-1">Upload a new image to replace.</p>
                    </div>
                @endif
            @endisset

            <input
                type="file"
                name="cover_image"
                accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50"
            >
            <p class="text-xs text-gray-400 mt-1.5">JPG, PNG, GIF up to 2MB.</p>
            @error('cover_image') <p class="form-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>
