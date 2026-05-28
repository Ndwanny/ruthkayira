@extends('layouts.app')

@section('title', '404 – Page Not Found | Ruth Kayira')

@section('content')

<div class="section pd-top-80px pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="text-center">
                <div class="mg-bottom-16px">
                    <p class="text-100 color-neutral-500">Error 404</p>
                </div>
                <h1 class="heading-h1-size mg-bottom-16px">Page Not Found</h1>
                <div class="inner-container _383px center-element">
                    <p class="mg-bottom-32px">The page you are looking for doesn't exist or has been moved. Let's get you back on track.</p>
                </div>
                <div class="buttons-row cta">
                    <div class="mg-bottom-15px-mbp">
                        <a href="{{ route('home') }}" class="link-wrapper mg-right-16px mg-right-0px-mbp w-inline-block">
                            <div class="link-text">Go home</div>
                            <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                        </a>
                    </div>
                    <a href="{{ route('contact') }}" class="link-wrapper w-inline-block">
                        <div class="link-text">Contact Ruth</div>
                        <div class="line-rounded-icon link-icon-right">&#xE803;</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
