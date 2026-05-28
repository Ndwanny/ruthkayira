<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 flex">

    {{-- Sidebar --}}
    <aside class="w-56 bg-white border-r border-gray-200 flex flex-col min-h-screen fixed top-0 left-0">
        <div class="px-5 py-5 border-b border-gray-200">
            <a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-900 tracking-tight">
                {{ config('app.name') }}
            </a>
            <p class="text-xs text-gray-400 mt-0.5">Admin Panel</p>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-0.5 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.posts.index') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.posts.*') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Posts
            </a>
            <a href="{{ route('admin.blog-categories.index') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.blog-categories.*') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Categories
            </a>
            <a href="{{ route('admin.pages.index') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.pages.*') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Pages
            </a>
            <a href="{{ route('admin.projects.index') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Projects
            </a>
            <a href="{{ route('admin.settings.index') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-gray-100 font-medium text-gray-900' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
        </nav>

        <div class="px-3 py-4 border-t border-gray-200">
            <p class="px-3 text-xs text-gray-500 mb-2">{{ auth()->user()->name }}</p>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="ml-56 flex-1 flex flex-col min-h-screen">
        <header class="bg-white border-b border-gray-200 px-8 py-4">
            <h1 class="text-base font-semibold text-gray-900">@yield('title', 'Dashboard')</h1>
        </header>

        <main class="flex-1 px-8 py-8">
            @if(session('success'))
                <div class="mb-6 flex items-center gap-2 px-4 py-3 bg-green-50 border border-green-200 rounded text-sm text-green-800">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
