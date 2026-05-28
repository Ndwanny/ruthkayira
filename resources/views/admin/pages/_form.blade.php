{{-- Shared form fields for create/edit page --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Left: main fields --}}
    <div class="md:col-span-2 space-y-5">
        <div>
            <label for="title" class="form-label">Title <span class="text-red-500">*</span></label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $page->title ?? '') }}"
                required
                class="form-input text-base @error('title') border-red-400 @enderror"
                placeholder="Page title"
            >
            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="body" class="form-label">Content <span class="text-red-500">*</span></label>
            <textarea
                id="body"
                name="body"
                rows="20"
                required
                class="form-input font-mono text-sm @error('body') border-red-400 @enderror"
                placeholder="Page content. HTML is supported."
            >{{ old('body', $page->body ?? '') }}</textarea>
            <p class="text-xs text-gray-400 mt-1">HTML is supported. Use &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;img src="..."&gt;, etc.</p>
            @error('body') <p class="form-error">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Right: meta --}}
    <div class="space-y-5">
        {{-- Settings --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Settings</h3>
            <label class="flex items-center gap-2 cursor-pointer">
                <input
                    type="checkbox"
                    name="show_in_nav"
                    value="1"
                    {{ old('show_in_nav', ($page->show_in_nav ?? true) ? '1' : '') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-gray-900 focus:ring-gray-400"
                >
                <span class="text-sm text-gray-700">Show in navigation</span>
            </label>

            @isset($page)
                <p class="text-xs text-gray-400 mt-3 font-mono">
                    URL: /page/{{ $page->slug }}
                </p>
            @endisset
        </div>

        {{-- Hero image --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Hero Image</h3>

            @isset($page)
                @if($page->hero_image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($page->hero_image) }}" alt="Hero" class="w-full h-28 object-cover rounded border border-gray-200">
                        <p class="text-xs text-gray-400 mt-1">Upload a new image to replace.</p>
                    </div>
                @endif
            @endisset

            <input
                type="file"
                name="hero_image"
                accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50"
            >
            <p class="text-xs text-gray-400 mt-1.5">Displayed at the top of the page.</p>
            @error('hero_image') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Meta --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">SEO</h3>
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea
                id="meta_description"
                name="meta_description"
                rows="3"
                maxlength="160"
                class="form-input text-xs @error('meta_description') border-red-400 @enderror"
                placeholder="Brief description for search engines (max 160 chars)"
            >{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
            @error('meta_description') <p class="form-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>
