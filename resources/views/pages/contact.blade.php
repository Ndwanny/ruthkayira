@extends('layouts.app')

@section('title', 'Contact - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'Interested in a custom order, a collaboration, or booking Ruth for a speaking engagement? Reach out below.')

@php
    $c   = $contactPage->content ?? [];
    $get = fn(string $key, string $default) => $c[$key] ?? $default;
@endphp

@section('content')

<div class="section pd-top-80px">
    <div class="container-default w-container">

        <div class="mg-bottom-32px">
            <div class="inner-container _443px">
                <h1 class="heading-h1-size mg-bottom-12px">{{ $get('hero_title', 'Get In Touch') }}</h1>
                <p class="mg-bottom-0">{{ $get('hero_subtitle', 'Interested in a custom order, a collaboration, or booking Ruth for a speaking engagement? Reach out below.') }}</p>
            </div>
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="card mg-bottom-32px">
                <div class="card-content-pd">
                    <div class="flex-horizontal align-center children-wrap">
                        <div class="line-rounded-icon success-message-check mg-right-16px">&#xE813;</div>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Contact form --}}
        <div class="card form">
            <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
                @csrf
                <div class="w-layout-grid grid-2-columns form">
                    <div>
                        <label for="name" class="title-dark-mode">Name</label>
                        <input class="input w-input @error('name') border-error @enderror" maxlength="256" name="name" id="name" placeholder="Your full name" type="text" value="{{ old('name') }}" required/>
                        @error('name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="title-dark-mode">Email</label>
                        <input class="input w-input @error('email') border-error @enderror" maxlength="256" name="email" id="email" placeholder="Your email address" type="email" value="{{ old('email') }}" required/>
                        @error('email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="title-dark-mode">Phone</label>
                        <input class="input w-input" maxlength="256" name="phone" id="phone" placeholder="Your phone number" type="tel" value="{{ old('phone') }}"/>
                    </div>
                    <div>
                        <label for="subject" class="title-dark-mode">Subject</label>
                        <input class="input w-input @error('subject') border-error @enderror" maxlength="256" name="subject" id="subject" placeholder="e.g. Custom furniture order, speaking booking, collaboration" type="text" value="{{ old('subject') }}" required/>
                        @error('subject') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="text-area-wrapper">
                        <label for="message" class="title-dark-mode">Leave us a message</label>
                        <textarea id="message" name="message" maxlength="5000" placeholder="Tell Ruth about your project, event, or enquiry..." class="text-area w-input">{{ old('message') }}</textarea>
                    </div>
                    <div class="link-form">
                        <div class="flex-horizontal children-wrap color-neutral-800">
                            <button type="submit" class="link-wrapper form w-button">Send message</button>
                            <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- Social media --}}
<div class="section">
    <div class="container-default w-container">
        <h2 class="heading-h2-size mg-bottom-32px">Follow me on social media</h2>
        <div class="w-layout-grid grid-4-columns gap-24px _4-col-tablet">
            <a href="{{ $get('social_facebook', 'https://www.facebook.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE809;</div></div><div>Facebook</div></div></div></div></a>
            <a href="{{ $get('social_twitter', 'https://twitter.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon icon-size-16px">&#xE80A;</div></div><div>Twitter</div></div></div></div></a>
            <a href="{{ $get('social_linkedin', 'https://www.linkedin.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80B;</div></div><div>LinkedIn</div></div></div></div></a>
            <a href="{{ $get('social_instagram', 'https://www.instagram.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80D;</div></div><div>Instagram</div></div></div></div></a>
            <a href="{{ $get('social_tiktok', 'https://www.tiktok.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><svg width="14" height="14" viewBox="0 0 24 27" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display:inline-block;vertical-align:middle;"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.75a4.85 4.85 0 0 1-1.01-.06z"/></svg></div><div>TikTok</div></div></div></div></a>
            <a href="{{ $get('social_whatsapp', 'https://www.whatsapp.com/') }}" target="_blank" class="card link-card w-inline-block"><div class="card-content-pd _25px"><div class="text-200 bold color-neutral-800"><div class="flex-horizontal align-center justify-center"><div class="mg-right-8px"><div class="social-media-icon">&#xE80E;</div></div><div>WhatsApp</div></div></div></div></a>
        </div>
    </div>
</div>

<div class="divider-wrapper"><div class="container-default w-container"><div class="divider _0px"></div></div></div>

{{-- FAQs --}}
@php
    $faqDefaults = [
        1 => ['q' => 'What drives you as a person?',                        'a' => 'A deep belief that African craftsmanship and creativity deserve to stand at the front of the global stage — not the sidelines. I am driven by the desire to build things that last, to mentor the next generation of makers, and to prove that purpose and ambition can exist in the same sentence.'],
        2 => ['q' => 'What does a typical day look like for you?',           'a' => 'There is no such thing as a typical day, and I have learned to be grateful for that. Most mornings start early and quietly — I think best before the noise begins. The rest of the day moves between the studio floor, client conversations, writing, and the occasional meeting I could have been an email. I try to end each day with something made, even if it is just a decision.'],
        3 => ['q' => 'What is one thing most people do not know about you?', 'a' => 'That I spent years working in government before any of this. I was not always an entrepreneur — I was someone with a quiet idea and a full-time job that had nothing to do with design. The leap was not dramatic. It was slow, deliberate, and sometimes terrifying. That backstory shapes how I think about risk and patience.'],
        4 => ['q' => 'How do you stay grounded when things get hard?',       'a' => 'I make something with my hands. It sounds simple, but there is something about the act of making — measuring, cutting, assembling — that resets everything for me. When my head is full of noise, my hands know what to do. That has never failed me.'],
    ];
    $faqIds = ['50b0bff5-3268-9792-1360-0989334ff9cc','affc6515-2b84-5ff7-74e4-e4872fd1e2e9','ffbb5005-8455-2e5b-8921-294753af6fea','cdc1eedb-367c-45da-1b1f-75c9eacdd7df'];
@endphp
<div class="section pd-bottom-48px">
    <div class="container-default w-container">
        <h2 class="heading-h2-size mg-bottom-28px">FAQs</h2>
        <div class="w-layout-grid grid-1-column gap-row-0">
            @for($i = 1; $i <= 4; $i++)
            <div data-w-id="{{ $faqIds[$i-1] }}" class="accordion-item-wrapper {{ $i === 1 ? 'first' : '' }}">
                <div class="accordion-content-wrapper">
                    <div class="accordion-header">
                        <h3 class="heading-h4-size mg-bottom-0">{{ $get('faq_'.$i.'_question', $faqDefaults[$i]['q']) }}</h3>
                    </div>
                    <div style="height:0px;opacity:0" class="acordion-body">
                        <div class="accordion-spacer"></div>
                        <p class="mg-bottom-0">{{ $get('faq_'.$i.'_answer', $faqDefaults[$i]['a']) }}</p>
                    </div>
                </div>
                <div class="accordion-side right-side"><div class="line-rounded-icon">&#xE811;</div></div>
            </div>
            @endfor
        </div>
    </div>
</div>

@endsection
