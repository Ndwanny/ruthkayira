<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="https://cdn.prod.website-files.com/" rel="preconnect" crossorigin="anonymous"/>
    <title>@yield('title', 'Ruth Kayira | My Perfect Stitch')</title>
    <meta content="@yield('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design and championing purpose-driven entrepreneurship in Zambia and beyond.')" name="description"/>
    <meta content="@yield('title', 'Ruth Kayira | My Perfect Stitch')" property="og:title"/>
    <meta content="@yield('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch.')" property="og:description"/>
    <meta content="https://ruthkayira.netlify.app/images/about.jpg" property="og:image"/>
    <meta content="@yield('title', 'Ruth Kayira | My Perfect Stitch')" property="twitter:title"/>
    <meta content="@yield('meta_description', 'Ruth Kayira Mooto is the founder of My Perfect Stitch.')" property="twitter:description"/>
    <meta content="https://ruthkayira.netlify.app/images/about.jpg" property="twitter:image"/>
    <meta property="og:type" content="website"/>
    <meta content="summary_large_image" name="twitter:card"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/css/simplematictemplate.webflow.16bababd0.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/" rel="preconnect"/>
    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google:{families:["Inter:regular,500,600"]}});</script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61f0206e172484e0864560bf_favicon-simplematic-template.svg" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/61f0207494638716720f051b_webclip-simplematic-template.svg" rel="apple-touch-icon"/>
    <style>.page-wrapper{opacity:1 !important;}.w-webflow-badge{display:none !important;}.nav-menu-main-wrapper{display:block;margin-left:auto;margin-right:auto;}.card.card-nav-menu-wrapper{width:100%;margin-left:auto;margin-right:auto;box-shadow:0 4px 24px rgba(0,0,0,0.10);}.card.card-nav-menu-wrapper .w-layout-grid.grid-nav-menu{display:flex !important;flex-direction:row !important;flex-wrap:nowrap !important;align-items:center !important;justify-content:space-around !important;width:100% !important;grid-template-columns:unset !important;}.card.card-nav-menu-wrapper .w-layout-grid.grid-nav-menu .nav-link{flex:1 1 0 !important;text-align:center !important;min-width:0 !important;}@media screen and (max-width:479px){.grid-2-columns.image-and-paragraph .avatar-circle{margin-left:auto;margin-right:auto;}}</style>
    @yield('extra_head')
</head>
<body class="body bg-neutral-200">

{{-- Page loader --}}
<div id="rk-loader">
    <div class="rk-panel rk-panel-l"></div>
    <div class="rk-panel rk-panel-r"></div>
    <div class="rk-loader-inner">
        <div class="rk-mono">Ruth Kayira</div>
        <svg class="rk-line" viewBox="0 0 160 2" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0" y1="1" x2="160" y2="1" stroke="#111" stroke-width="1.5" stroke-dasharray="160" stroke-dashoffset="160"/>
        </svg>
    </div>
</div>
<style>
#rk-loader{position:fixed;inset:0;z-index:99999;display:flex;align-items:center;justify-content:center;}.rk-panel{position:absolute;top:0;bottom:0;width:50%;background:#fff;transition:transform .72s cubic-bezier(.76,0,.24,1);}.rk-panel-l{left:0;}.rk-panel-r{right:0;}#rk-loader.rk-open .rk-panel-l{transform:translateX(-100%);}#rk-loader.rk-open .rk-panel-r{transform:translateX(100%);}#rk-loader.rk-gone{display:none;}.rk-loader-inner{position:relative;z-index:1;text-align:center;transition:opacity .25s ease;}#rk-loader.rk-open .rk-loader-inner{opacity:0;}.rk-mono{font-family:Georgia,serif;font-size:46px;font-weight:700;color:#111;letter-spacing:4px;opacity:0;transform:translateY(18px);animation:rkUp .6s ease .15s forwards;}.rk-line{display:block;width:160px;height:2px;margin:20px auto;}.rk-line line{animation:rkDraw .9s ease .55s forwards;}@keyframes rkUp{to{opacity:1;transform:translateY(0);}}@keyframes rkDraw{to{stroke-dashoffset:0;}}
</style>
<script>(function(){var el=document.getElementById('rk-loader');function reveal(){el.classList.add('rk-open');setTimeout(function(){el.classList.add('rk-gone');},750);}if(document.readyState==='complete'){setTimeout(reveal,1500);}else{window.addEventListener('load',function(){setTimeout(reveal,500);});}})();</script>

<div style="opacity:0" class="page-wrapper">

    @yield('content')

    {{-- Navigation bar (icon links) --}}
    <div data-w-id="f3c1e99f-dc6a-42ce-1328-fbdb42529599" data-animation="default" data-collapse="none" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="nav-menu-main-wrapper w-nav">
        <div class="container-default nav-menu w-container">
            <div class="card card-nav-menu-wrapper">
                <div class="w-layout-grid grid-nav-menu">
                    <a href="{{ route('home') }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }} class="nav-link w-inline-block {{ request()->routeIs('home') ? 'w--current' : '' }}"><div>&#xE800;</div></a>
                    <a href="{{ route('about') }}" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }} class="nav-link w-inline-block {{ request()->routeIs('about') ? 'w--current' : '' }}"><div>&#xE801;</div></a>
                    <a href="{{ route('blog.index') }}" {{ request()->routeIs('blog.*') ? 'aria-current="page"' : '' }} class="nav-link w-inline-block {{ request()->routeIs('blog.*') ? 'w--current' : '' }}"><div>&#xE812;</div></a>
                    <a href="{{ route('portfolio') }}" {{ request()->routeIs('portfolio') ? 'aria-current="page"' : '' }} class="nav-link w-inline-block {{ request()->routeIs('portfolio') ? 'w--current' : '' }}"><div>&#xE804;</div></a>
                    <a href="{{ route('contact') }}" {{ request()->routeIs('contact*') ? 'aria-current="page"' : '' }} class="nav-link w-inline-block {{ request()->routeIs('contact*') ? 'w--current' : '' }}"><div>&#xE806;</div></a>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Full navigation overlay --}}
<div id="rk-nav-overlay" class="position-fixed full navigation" style="display:none">
    <div class="card navigation">
        <div class="navigation-header">
            <div class="flex-horizontal align-center children-wrap">
                <div class="heading-h3-size">Navigation</div>
                <a id="rk-nav-close" href="#" class="close-button mg-left-auto">&#xE807;</a>
            </div>
        </div>
        <div class="navigation-content">
            <div class="w-layout-grid grid-2-columns _2-col-mbl width-100">
                <div>
                    <div class="heading-h4-size mg-bottom-16px">Pages</div>
                    <div class="w-layout-grid grid-2-columns nav-menu">
                        <ul role="list" class="nav-menu-list w-list-unstyled">
                            <li class="nav-menu-list-item"><a href="{{ route('home') }}" class="nav-menu-link">Home</a></li>
                            <li class="nav-menu-list-item"><a href="{{ route('about') }}" class="nav-menu-link">About</a></li>
                            <li class="nav-menu-list-item"><a href="{{ route('blog.index') }}" class="nav-menu-link">Blog Posts</a></li>
                        </ul>
                        <ul role="list" class="nav-menu-list w-list-unstyled">
                            <li class="nav-menu-list-item"><a href="{{ route('portfolio') }}" class="nav-menu-link">Portfolio</a></li>
                            <li class="nav-menu-list-item"><a href="{{ route('contact') }}" class="nav-menu-link">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="rk-nav-backdrop" class="position-fixed full navigation-close" style="display:none"></div>
<script>
(function(){
    function openNav(){
        document.getElementById('rk-nav-overlay').style.display='';
        document.getElementById('rk-nav-backdrop').style.display='';
    }
    function closeNav(){
        document.getElementById('rk-nav-overlay').style.display='none';
        document.getElementById('rk-nav-backdrop').style.display='none';
    }
    document.addEventListener('DOMContentLoaded',function(){
        var btn=document.querySelector('[data-w-id="f3c1e99f-dc6a-42ce-1328-fbdb425295b2"]');
        if(btn) btn.addEventListener('click',openNav);
        var cls=document.getElementById('rk-nav-close');
        if(cls) cls.addEventListener('click',function(e){e.preventDefault();closeNav();});
        var bck=document.getElementById('rk-nav-backdrop');
        if(bck) bck.addEventListener('click',closeNav);
    });
})();
</script>

{{-- Loading bar --}}
<div class="loading-bar-wrapper">
    <div class="loading-bar-block-left"></div>
    <div class="loading-bar"></div>
    <div class="loading-bar-block-right"></div>
</div>

<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c881ca.js?site=61e8c105beb7fc03587e58df" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.prod.website-files.com/61e8c105beb7fc03587e58df/js/webflow.a39911895.js" type="text/javascript"></script>

</body>
</html>
