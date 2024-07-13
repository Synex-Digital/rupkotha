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
Route::get('/blogs', [BlogSingleController::class, 'blogs'])->name('blog.all');
Route::get('/categories/{slugs}', [UserHomeController::class, 'category'])->name('category.view');
Route::get('/view', [UserHomeController::class, 'blog'])->name('blog.font');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('privacy');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('sitemap');


// backend routes
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resources([
    'category' => CategoryController::class,
    'blog' => BlogController::class,
    'user' => UserController::class,
    'config' => ConfigController::class,
    'social' => SocialController::class,
    'custom_code' => CustomeCodeController::class,
    'seo' => SeoController::class

]);

//Auth::routes();

Route::prefix('sd-admin')->group(function () {
    // Custom routes
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);
});