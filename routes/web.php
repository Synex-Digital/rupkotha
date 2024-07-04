<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CustomeCodeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\BlogSingleController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [UserHomeController::class, 'index'])->name('home');
Route::get('/view/{id}', [BlogSingleController::class, 'index'])->name('blog.view');
Route::get('/categories/{slugs}', [UserHomeController::class, 'category'])->name('category.view');
Route::get('/view', [UserHomeController::class, 'blog'])->name('blog.font');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('privacy');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('sitemap');

// Route::get('/dashboard', function() {
//     return view('dashboard.index');
// });


// backend routes
Route::resources([
    'category' => CategoryController::class,
    'blog' => BlogController::class,
    'user' => UserController::class,
    'config' => ConfigController::class,
    'social' => SocialController::class,
    'custom_code' => CustomeCodeController::class,
    'seo' => SeoController::class

]);

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
