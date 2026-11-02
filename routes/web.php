<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Landing Page Routes (Single Page Application & Separate Articles)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/artikel', [LandingPageController::class, 'articles'])->name('articles.index');
Route::get('/artikel/{slug}', [LandingPageController::class, 'articleShow'])->name('articles.show');
Route::get('/api/artikel/{slug}', [LandingPageController::class, 'getArticleDetail'])->name('article.detail.api');
Route::post('/artikel/{id}/like', [LandingPageController::class, 'likeArticle'])->name('article.like');
Route::post('/artikel/{id}/comment', [LandingPageController::class, 'postComment'])->name('article.comment');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/auth-kelola-ac', [AuthController::class, 'showLoginForm']);
Route::post('/auth-kelola-ac', [AuthController::class, 'login']);

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Protected Admin CMS Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/quick-whatsapp', [DashboardController::class, 'quickUpdateWhatsapp'])->name('quick_whatsapp');

    // Sliders
    Route::resource('sliders', SliderController::class)->except(['create', 'show', 'edit']);

    // Layanan & Tarif
    Route::resource('services', ServiceController::class)->except(['create', 'show', 'edit']);

    // Promo
    Route::resource('promos', PromoController::class)->except(['create', 'show', 'edit']);

    // Keunggulan
    Route::resource('advantages', AdvantageController::class)->except(['create', 'show', 'edit']);

    // Profil Tentang Kami & Visi Misi
    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company_profile.index');
    Route::put('/company-profile', [CompanyProfileController::class, 'update'])->name('company_profile.update');

    // Statistik & Angka
    Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');
    Route::put('/statistics', [StatisticController::class, 'update'])->name('statistics.update');

    // Testimoni
    Route::resource('testimonials', TestimonialController::class)->except(['create', 'show', 'edit']);

    // Artikel
    Route::resource('articles', ArticleController::class)->except(['show']);

    // Moderasi Komentar
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::put('/comments/{id}/toggle', [CommentController::class, 'toggleStatus'])->name('comments.toggle');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Pengaturan Website
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Profil & Keamanan Admin
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/info', [ProfileController::class, 'updateProfile'])->name('profile.update_info');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');
});
