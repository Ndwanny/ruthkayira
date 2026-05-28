@php $c = $page->content ?? []; @endphp

<div class="space-y-8">

    {{-- Page settings sidebar --}}
    <div class="grid grid-cols-3 gap-8">
        <div class="col-span-2">
            <div>
                <label class="form-label">Page Title</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" required class="form-input text-base">
            </div>
        </div>
        <div class="space-y-4">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Settings</h3>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="show_in_nav" value="1" {{ old('show_in_nav', $page->show_in_nav ? '1' : '') ? 'checked' : '' }} class="rounded border-gray-300 text-gray-900 focus:ring-gray-400">
                    <span class="text-sm text-gray-700">Show in navigation</span>
                </label>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-3">SEO</h3>
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="3" maxlength="160" class="form-input text-xs" placeholder="Max 160 chars">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Hero --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200"><h2 class="text-sm font-medium text-gray-900">Hero Section</h2></div>
        <div class="px-6 py-5 space-y-4">
            <div>
                <label class="form-label">Heading</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $c['hero_title'] ?? 'Get In Touch') }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Subtitle</label>
                <textarea name="hero_subtitle" rows="2" class="form-input">{{ old('hero_subtitle', $c['hero_subtitle'] ?? 'Interested in a custom order, a collaboration, or booking Ruth for a speaking engagement? Reach out below.') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Social media links --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-sm font-medium text-gray-900">Social Media Links</h2>
            <p class="text-xs text-gray-400 mt-0.5">Update the URLs for each social platform shown on the contact page.</p>
        </div>
        <div class="px-6 py-5 space-y-4">
            @foreach([
                ['key' => 'social_facebook',  'label' => 'Facebook',  'placeholder' => 'https://www.facebook.com/yourpage'],
                ['key' => 'social_twitter',   'label' => 'Twitter',   'placeholder' => 'https://twitter.com/yourhandle'],
                ['key' => 'social_linkedin',  'label' => 'LinkedIn',  'placeholder' => 'https://www.linkedin.com/in/yourprofile'],
                ['key' => 'social_instagram', 'label' => 'Instagram', 'placeholder' => 'https://www.instagram.com/yourhandle'],
                ['key' => 'social_tiktok',    'label' => 'TikTok',    'placeholder' => 'https://www.tiktok.com/@yourhandle'],
                ['key' => 'social_whatsapp',  'label' => 'WhatsApp',  'placeholder' => 'https://wa.me/yourphonenumber'],
            ] as $social)
            <div>
                <label class="form-label">{{ $social['label'] }}</label>
                <input type="url" name="{{ $social['key'] }}"
                    value="{{ old($social['key'], $c[$social['key']] ?? '') }}"
                    class="form-input" placeholder="{{ $social['placeholder'] }}">
            </div>
            @endforeach
        </div>
    </div>

    {{-- FAQs --}}
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-sm font-medium text-gray-900">FAQs</h2>
            <p class="text-xs text-gray-400 mt-0.5">Four accordion questions shown below the social media section.</p>
        </div>
        <div class="px-6 py-5 space-y-6">
            @php
                $faqDefaults = [
                    1 => ['q' => 'What drives you as a person?',                        'a' => 'A deep belief that African craftsmanship and creativity deserve to stand at the front of the global stage — not the sidelines. I am driven by the desire to build things that last, to mentor the next generation of makers, and to prove that purpose and ambition can exist in the same sentence.'],
                    2 => ['q' => 'What does a typical day look like for you?',           'a' => 'There is no such thing as a typical day, and I have learned to be grateful for that. Most mornings start early and quietly — I think best before the noise begins. The rest of the day moves between the studio floor, client conversations, writing, and the occasional meeting I could have been an email. I try to end each day with something made, even if it is just a decision.'],
                    3 => ['q' => 'What is one thing most people do not know about you?', 'a' => 'That I spent years working in government before any of this. I was not always an entrepreneur — I was someone with a quiet idea and a full-time job that had nothing to do with design. The leap was not dramatic. It was slow, deliberate, and sometimes terrifying. That backstory shapes how I think about risk and patience.'],
                    4 => ['q' => 'How do you stay grounded when things get hard?',       'a' => 'I make something with my hands. It sounds simple, but there is something about the act of making — measuring, cutting, assembling — that resets everything for me. When my head is full of noise, my hands know what to do. That has never failed me.'],
                ];
            @endphp
            @for($i = 1; $i <= 4; $i++)
            <div class="border border-gray-100 rounded-lg p-4 space-y-3">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">FAQ {{ $i }}</p>
                <div>
                    <label class="form-label">Question</label>
                    <input type="text" name="faq_{{ $i }}_question"
                        value="{{ old('faq_'.$i.'_question', $c['faq_'.$i.'_question'] ?? $faqDefaults[$i]['q']) }}"
                        class="form-input">
                </div>
                <div>
                    <label class="form-label">Answer</label>
                    <textarea name="faq_{{ $i }}_answer" rows="4" class="form-input">{{ old('faq_'.$i.'_answer', $c['faq_'.$i.'_answer'] ?? $faqDefaults[$i]['a']) }}</textarea>
                </div>
            </div>
            @endfor
        </div>
    </div>

</div>
