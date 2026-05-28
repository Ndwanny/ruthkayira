@extends('layouts.app')

@section('title', 'Shop - Ruth Kayira | My Perfect Stitch')
@section('meta_description', 'Explore bespoke furniture and fashion pieces handcrafted with African heritage and bold, functional design from My Perfect Stitch.')

@section('content')

<div class="section pd-top-80px pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">

            <div class="mg-bottom-32px">
                <div class="inner-container _408px">
                    <h1 class="heading-h1-size mg-bottom-16px">Shop</h1>
                    <p class="mg-bottom-0">Explore bespoke furniture and fashion pieces handcrafted with African heritage and bold, functional design from <span class="text-no-wrap">My Perfect Stitch.</span></p>
                </div>
            </div>

            @if($products->isNotEmpty())
            <div role="list" class="grid-2-columns gap-24px w-dyn-items">
                @foreach($products as $product)
                <div role="listitem" class="w-dyn-item">
                    <a href="{{ route('shop.show', $product->slug) }}" class="card product link-card w-inline-block">
                        <div class="image-wrapper">
                            @php
                                $imgSrc = $product->main_image
                                    ? (str_starts_with($product->main_image, 'http') ? $product->main_image : Storage::url($product->main_image))
                                    : 'https://images.unsplash.com/photo-1653971858474-4f2dfa7f4dc1?fm=jpg&q=60&w=800&auto=format&fit=crop';
                            @endphp
                            <img src="{{ $imgSrc }}" loading="eager" alt="{{ $product->title }}" class="image cover"/>
                        </div>
                        <div class="card-content-pd card-product">
                            <div class="mg-bottom-12px"><div class="text-100 medium color-neutral-800">{{ $product->formattedPrice() }}</div></div>
                            <h2 class="heading-h3-size mg-bottom-8px">{{ $product->title }}</h2>
                            <p class="mg-bottom-16px">{{ $product->description }}</p>
                            <div class="mg-top-auto">
                                <div class="link-wrapper">
                                    <div class="link-text">Enquire now</div>
                                    <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
                <p class="text-center text-gray-500 py-12">No products available yet.</p>
            @endif

        </div>
    </div>
</div>

@endsection
