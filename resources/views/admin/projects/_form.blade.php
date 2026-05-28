{{-- Shared form fields for create/edit project --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Left: main fields --}}
    <div class="md:col-span-2 space-y-5">

        <div>
            <label for="title" class="form-label">Title <span class="text-red-500">*</span></label>
            <input id="title" type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
                class="form-input text-base @error('title') border-red-400 @enderror" placeholder="Project title">
            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="slug" class="form-label">Slug</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $project->slug ?? '') }}"
                class="form-input @error('slug') border-red-400 @enderror" placeholder="auto-generated if empty">
            @error('slug') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tagline" class="form-label">Tagline</label>
            <input id="tagline" type="text" name="tagline" value="{{ old('tagline', $project->tagline ?? '') }}"
                class="form-input @error('tagline') border-red-400 @enderror" placeholder="Short project tagline">
            @error('tagline') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="client" class="form-label">Client</label>
                <input id="client" type="text" name="client" value="{{ old('client', $project->client ?? '') }}"
                    class="form-input @error('client') border-red-400 @enderror">
                @error('client') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="date_range" class="form-label">Date Range</label>
                <input id="date_range" type="text" name="date_range" value="{{ old('date_range', $project->date_range ?? '') }}"
                    class="form-input @error('date_range') border-red-400 @enderror" placeholder="e.g. 2018 – Present">
                @error('date_range') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="services" class="form-label">Services</label>
                <input id="services" type="text" name="services" value="{{ old('services', $project->services ?? '') }}"
                    class="form-input @error('services') border-red-400 @enderror">
                @error('services') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="deliverables" class="form-label">Deliverables</label>
                <input id="deliverables" type="text" name="deliverables" value="{{ old('deliverables', $project->deliverables ?? '') }}"
                    class="form-input @error('deliverables') border-red-400 @enderror">
                @error('deliverables') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="website_url" class="form-label">Website URL</label>
            <input id="website_url" type="url" name="website_url" value="{{ old('website_url', $project->website_url ?? '') }}"
                class="form-input @error('website_url') border-red-400 @enderror" placeholder="https://...">
            @error('website_url') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="about_col1" class="form-label">About the Project — Column 1</label>
            <textarea id="about_col1" name="about_col1" rows="5"
                class="form-input @error('about_col1') border-red-400 @enderror"
                placeholder="First paragraph of project description">{{ old('about_col1', $project->about_col1 ?? '') }}</textarea>
            @error('about_col1') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="about_col2" class="form-label">About the Project — Column 2</label>
            <textarea id="about_col2" name="about_col2" rows="5"
                class="form-input @error('about_col2') border-red-400 @enderror"
                placeholder="Second paragraph of project description">{{ old('about_col2', $project->about_col2 ?? '') }}</textarea>
            @error('about_col2') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="exec_col1" class="form-label">Project Execution — Column 1</label>
            <textarea id="exec_col1" name="exec_col1" rows="5"
                class="form-input @error('exec_col1') border-red-400 @enderror"
                placeholder="First paragraph of execution details">{{ old('exec_col1', $project->exec_col1 ?? '') }}</textarea>
            @error('exec_col1') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="exec_col2" class="form-label">Project Execution — Column 2</label>
            <textarea id="exec_col2" name="exec_col2" rows="5"
                class="form-input @error('exec_col2') border-red-400 @enderror"
                placeholder="Second paragraph of execution details">{{ old('exec_col2', $project->exec_col2 ?? '') }}</textarea>
            @error('exec_col2') <p class="form-error">{{ $message }}</p> @enderror
        </div>

    </div>

    {{-- Right: meta & images --}}
    <div class="space-y-5">

        {{-- Publish --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Publish</h3>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="published" value="1"
                    {{ old('published', ($project->published ?? false) ? '1' : '') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-gray-900 focus:ring-gray-400">
                <span class="text-sm text-gray-700">Published</span>
            </label>
            <p class="text-xs text-gray-400 mt-1.5">Uncheck to save as draft.</p>
        </div>

        {{-- Category & Sort --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 space-y-4">
            <div>
                <label for="category" class="form-label">Category</label>
                <input id="category" type="text" name="category" value="{{ old('category', $project->category ?? '') }}"
                    class="form-input @error('category') border-red-400 @enderror" placeholder="e.g. Furniture">
                @error('category') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="sort_order" class="form-label">Sort Order</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}"
                    class="form-input @error('sort_order') border-red-400 @enderror">
                @error('sort_order') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Hero Image --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Hero Image</h3>
            @isset($project)
                @if($project->hero_image)
                    <div class="mb-3">
                        @if(str_starts_with($project->hero_image, 'http'))
                            <img src="{{ $project->hero_image }}" alt="Hero" class="w-full h-24 object-cover rounded border border-gray-200">
                        @else
                            <img src="{{ Storage::url($project->hero_image) }}" alt="Hero" class="w-full h-24 object-cover rounded border border-gray-200">
                        @endif
                        <p class="text-xs text-gray-400 mt-1">Upload to replace.</p>
                    </div>
                @endif
            @endisset
            <input type="file" name="hero_image" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            @error('hero_image') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Image 1 --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Side Image 1</h3>
            @isset($project)
                @if($project->image_1)
                    <div class="mb-3">
                        @if(str_starts_with($project->image_1, 'http'))
                            <img src="{{ $project->image_1 }}" alt="Image 1" class="w-full h-20 object-cover rounded border border-gray-200">
                        @else
                            <img src="{{ Storage::url($project->image_1) }}" alt="Image 1" class="w-full h-20 object-cover rounded border border-gray-200">
                        @endif
                    </div>
                @endif
            @endisset
            <input type="file" name="image_1" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            @error('image_1') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Image 2 --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Side Image 2</h3>
            @isset($project)
                @if($project->image_2)
                    <div class="mb-3">
                        @if(str_starts_with($project->image_2, 'http'))
                            <img src="{{ $project->image_2 }}" alt="Image 2" class="w-full h-20 object-cover rounded border border-gray-200">
                        @else
                            <img src="{{ Storage::url($project->image_2) }}" alt="Image 2" class="w-full h-20 object-cover rounded border border-gray-200">
                        @endif
                    </div>
                @endif
            @endisset
            <input type="file" name="image_2" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            @error('image_2') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Exec Image --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Execution Image</h3>
            @isset($project)
                @if($project->exec_image)
                    <div class="mb-3">
                        @if(str_starts_with($project->exec_image, 'http'))
                            <img src="{{ $project->exec_image }}" alt="Exec Image" class="w-full h-20 object-cover rounded border border-gray-200">
                        @else
                            <img src="{{ Storage::url($project->exec_image) }}" alt="Exec Image" class="w-full h-20 object-cover rounded border border-gray-200">
                        @endif
                    </div>
                @endif
            @endisset
            <input type="file" name="exec_image" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-gray-300 file:text-xs file:bg-white file:text-gray-700 hover:file:bg-gray-50">
            @error('exec_image') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Icon URL --}}
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Icon URL</h3>
            <input type="text" name="icon_url" value="{{ old('icon_url', $project->icon_url ?? '') }}"
                class="form-input @error('icon_url') border-red-400 @enderror" placeholder="https://...">
            <p class="text-xs text-gray-400 mt-1.5">Optional SVG icon shown on portfolio card.</p>
            @error('icon_url') <p class="form-error">{{ $message }}</p> @enderror
        </div>

    </div>
</div>
