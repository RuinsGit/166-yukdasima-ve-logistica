<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LogoApiController;
use App\Http\Controllers\Api\TranslationManageController;
use App\Http\Controllers\Api\SeoController;
use App\Http\Controllers\Api\SocialMediaApiController;
use App\Http\Controllers\Api\SocialshareApiController;
use App\Http\Controllers\Api\SocialfooterApiController;
use App\Http\Controllers\Api\AboutPageApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\HomeCartApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\ContactDataApiController;
use App\Http\Controllers\Api\ContactRequestApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Logo Routes
Route::get('/logos', [LogoApiController::class, 'index']);
Route::get('/logos/{id}', [LogoApiController::class, 'show']);
Route::get('/logos/key/{key}', [LogoApiController::class, 'getByKey']);
Route::get('/logos/group/{group}', [LogoApiController::class, 'getByGroup']);

// Translation Routes
Route::get('translations', [TranslationManageController::class, 'index']);
Route::get('translations/{id}', [TranslationManageController::class, 'show']);
Route::get('translations/key/{key}', [TranslationManageController::class, 'getByKey']);
Route::get('translations/group/{group}', [TranslationManageController::class, 'getByGroup']);

// SEO Routes
Route::prefix('seo')->group(function () {
    Route::get('/', [SeoController::class, 'index']);
    Route::get('/{key}', [SeoController::class, 'show']);
    Route::post('/', [SeoController::class, 'store']);
    Route::put('/{id}', [SeoController::class, 'update']);
    Route::delete('/{id}', [SeoController::class, 'destroy']);
});

// Social Media Routes
Route::prefix('social-media')->group(function () {
    Route::get('/', [SocialMediaApiController::class, 'index']);
    Route::get('/{id}', [SocialMediaApiController::class, 'show']);
    Route::post('/', [SocialMediaApiController::class, 'store']);
    Route::put('/{id}', [SocialMediaApiController::class, 'update']);
    Route::delete('/{id}', [SocialMediaApiController::class, 'destroy']);
    Route::post('/{id}/toggle-status', [SocialMediaApiController::class, 'toggleStatus']);
});

// Socialshare Routes
Route::prefix('socialshares')->group(function () {
    Route::get('/', [SocialshareApiController::class, 'index']);
    Route::get('/{id}', [SocialshareApiController::class, 'show']);
    Route::post('/', [SocialshareApiController::class, 'store']);
    Route::put('/{id}', [SocialshareApiController::class, 'update']);
    Route::delete('/{id}', [SocialshareApiController::class, 'destroy']);
});

// Social Footer Routes
Route::prefix('social-footer')->group(function () {
    Route::get('/', [SocialfooterApiController::class, 'index']);
    Route::get('/{id}', [SocialfooterApiController::class, 'show']);
    Route::post('/', [SocialfooterApiController::class, 'store']);
    Route::put('/{id}', [SocialfooterApiController::class, 'update']);
    Route::delete('/{id}', [SocialfooterApiController::class, 'destroy']);
});

// About Page Routes
Route::prefix('about')->group(function () {
    Route::get('/', [AboutPageApiController::class, 'index']);
    Route::get('/{id}', [AboutPageApiController::class, 'show']);
});

Route::apiResource('about-pages', \App\Http\Controllers\Api\AboutPageApiController::class)
    ->except(['create', 'edit']);

// Status toggle için ek route
Route::post('/about-pages/{id}/toggle-status', [AboutPageApiController::class, 'toggleStatus']);


// Contact Routes
Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactApiController::class, 'index']);
    Route::get('/{id}', [ContactApiController::class, 'show']);
    Route::post('/', [ContactApiController::class, 'store']);
    Route::put('/{id}', [ContactApiController::class, 'update']);
    Route::delete('/{id}', [ContactApiController::class, 'destroy']);
});

// Home Cart Routes
Route::apiResource('home-carts', \App\Http\Controllers\Api\HomeCartApiController::class);
Route::put('home-carts/{id}/toggle-status', [\App\Http\Controllers\Api\HomeCartApiController::class, 'toggleStatus']);

// Blog Routes
Route::get('blogs', [BlogApiController::class, 'index']);
Route::get('blogs/{id}', [BlogApiController::class, 'show']);
Route::get('blogs/featured', [BlogApiController::class, 'getFeatured']);
Route::get('blogs/latest', [BlogApiController::class, 'getLatest']);
Route::get('blogs/popular', [BlogApiController::class, 'getPopular']);
Route::get('blogs/category/{category}', [BlogApiController::class, 'getByCategory']);
Route::get('blogs/tag/{tag}', [BlogApiController::class, 'getByTag']);
Route::get('blogs/search', [BlogApiController::class, 'search']);
Route::get('blogs/related', [BlogApiController::class, 'getRelated']);
Route::put('blogs/{id}/toggle-status', [\App\Http\Controllers\Api\BlogApiController::class, 'toggleStatus']);

// Contact Data Routes
Route::get('contact-data', [ContactDataApiController::class, 'index']);
Route::get('contact-data/{id}', [ContactDataApiController::class, 'show']);
Route::put('contact-data/{id}/toggle-status', [\App\Http\Controllers\Api\ContactDataApiController::class, 'toggleStatus']);

// Contact Request Routes
Route::post('contact-requests', [ContactRequestApiController::class, 'store']);
Route::get('contact-requests', [ContactRequestApiController::class, 'index']);
Route::get('contact-requests/{id}', [ContactRequestApiController::class, 'show']);
Route::put('contact-requests/{id}/toggle-status', [\App\Http\Controllers\Api\ContactRequestApiController::class, 'toggleStatus']);

