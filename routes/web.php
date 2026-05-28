<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;

// ── Public static pages ────────────────────────────────────────
Route::get('/',        [StaticPageController::class, 'home'])->name('home');
Route::get('/about',   [StaticPageController::class, 'about'])->name('about');
Route::get('/contact', [StaticPageController::class, 'contact'])->name('contact');
Route::post('/contact',[StaticPageController::class, 'contactSubmit'])->name('contact.submit');

// ── Portfolio ──────────────────────────────────────────────────
Route::get('/portfolio',        [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// ── Blog ───────────────────────────────────────────────────────
Route::get('/blog',        [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::redirect('/speaking-media', '/blog', 301);
Route::redirect('/speaking-media/{slug}', '/blog/{slug}', 301);

// ── CMS pages (admin-created) ──────────────────────────────────
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// ── Admin auth ─────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',   [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',  [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('posts',    PostController::class);
        Route::resource('blog-categories', \App\Http\Controllers\Admin\BlogCategoryController::class);
        Route::resource('pages',    PageAdminController::class);
        Route::resource('projects', ProjectController::class);
        Route::get('settings',  [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
