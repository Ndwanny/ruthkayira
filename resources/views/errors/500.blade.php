@extends('layouts.app')

@section('title', '500 – Server Error | Ruth Kayira')

@section('content')

<div class="section pd-top-80px pd-bottom-48px">
    <div class="container-default w-container">
        <div class="inner-container _432px-mbl center-element">
            <div class="text-center">
                <div class="mg-bottom-16px">
                    <p class="text-100 color-neutral-500">Error 500</p>
                </div>
                <h1 class="heading-h1-size mg-bottom-16px">Server Error</h1>
                <div class="inner-container _383px center-element">
                    <p class="mg-bottom-32px">Something went wrong on our end. Please try again in a moment, or contact us if the problem persists.</p>
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
