<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EstateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\ParselController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\ServiceContentController;
use App\Http\Controllers\Admin\ContactContentController;

// Web Routes
Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/search', [WebController::class, 'search'])->name('estate.search');
Route::get('/advanced-search', [WebController::class, 'advancedSearch'])->name('estate.advanced-search');
Route::get('/properties', [WebController::class, 'properties'])->name('estate.properties');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/services', [WebController::class, 'services'])->name('services');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact', [WebController::class, 'sendContact'])->name('contact.send');

// Favori Routes
Route::post('/favorites/add', [FavoriteController::class, 'addToFavorites'])->name('favorites.add');
Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->name('favorites.index');
Route::post('/favorites/remove', [FavoriteController::class, 'removeFromFavorites'])->name('favorites.remove');
Route::get('/favorites/count', [FavoriteController::class, 'getFavoritesCount'])->name('favorites.count');
Route::post('/favorites/sync', [FavoriteController::class, 'syncFavorites'])->name('favorites.sync');
Route::post('/favorites/clear', [FavoriteController::class, 'clearFavorites'])->name('favorites.clear');

// Parsel Sorgulama Routes - Estate route'undan önce gelmeli
Route::get('/parsel-sorgula', [ParselController::class, 'index'])->name('parsel.index');
Route::post('/parsel-sorgula', [ParselController::class, 'search'])->name('parsel.search');
Route::get('/parsel/{parcelNumber}/estates', [ParselController::class, 'estatesByParcel'])->name('parsel.estates');
Route::post('/tkgm-parsel-sorgula', [WebController::class, 'tkgmParselSorgula'])->name('tkgm.parsel.sorgula');
Route::post('/tkgm-parsel-sorgu-curl', [WebController::class, 'tkgmParselSorguCurl'])->name('tkgm.parsel.sorgu.curl');

//Admin Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Estate routes - create route'u önce gelmeli
    Route::get('/estate/create', [EstateController::class, 'create'])->name('estate.create');
    Route::post('/estate', [EstateController::class, 'store'])->name('estate.store');
    Route::get('/estate/{estate}/edit', [EstateController::class, 'edit'])->name('estate.edit');
    Route::put('/estate/{estate}', [EstateController::class, 'update'])->name('estate.update');
    Route::delete('/estate/{estate}', [EstateController::class, 'destroy'])->name('estate.destroy');
    Route::get('/estate', [EstateController::class, 'index'])->name('estate.index');

    Route::resource('users', UserController::class);

    Route::get('/myprofile',  [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/myprofile',  [ProfileController::class, 'update'])->name('profile.update');

    // Review Management Routes
    Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
    Route::post('/admin/reviews/{id}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::post('/admin/reviews/{id}/reject', [AdminReviewController::class, 'reject'])->name('admin.reviews.reject');
    Route::delete('/admin/reviews/{id}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

    // Hakkımızda içerik düzenleme
    Route::get('/admin/about/edit', [\App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('/admin/about/update', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('admin.about.update');

    // Hizmetler içerik düzenleme
    Route::get('/admin/service-content', [ServiceContentController::class, 'edit'])->name('admin.service-content.edit');
    Route::post('/admin/service-content/update', [ServiceContentController::class, 'update'])->name('admin.service-content.update');

    // İletişim içerik düzenleme
    Route::get('/admin/contact-content', [ContactContentController::class, 'edit'])->name('admin.contact-content.edit');
    Route::post('/admin/contact-content/update', [ContactContentController::class, 'update'])->name('admin.contact-content.update');

    // Ana sayfa içerik düzenleme
    Route::get('/admin/home-content/edit', [\App\Http\Controllers\Admin\HomeContentController::class, 'edit'])->name('admin.home-content.edit');
    Route::post('/admin/home-content/update', [\App\Http\Controllers\Admin\HomeContentController::class, 'update'])->name('admin.home-content.update');
});

// Review Routes
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{estateId}', [ReviewController::class, 'getReviews'])->name('reviews.get');

// Estate detail route - en sona taşındı
Route::get('/estate/{id}', [WebController::class, 'show'])->name('estate.show');
