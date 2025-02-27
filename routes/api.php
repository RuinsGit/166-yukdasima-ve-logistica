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
use App\Http\Controllers\Api\CountryFlagApiController;
use App\Http\Controllers\Api\HomeCartTwoApiController;
use App\Http\Controllers\Api\HomeHeroApiController;
use App\Http\Controllers\Api\HomeSectionApiController;
use App\Http\Controllers\Api\TeamApiController;
use App\Http\Controllers\Api\OurClientApiController;
use App\Http\Controllers\Api\ServiceTypeApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\NetworkApiController;
use App\Http\Controllers\Api\ServicesHeroApiController;
use App\Http\Controllers\Api\BlogHeroApiController;
use App\Http\Controllers\Api\NetworkHeroApiController;
use App\Http\Controllers\Api\ContinentApiController;


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
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogApiController::class, 'listAll']);
    Route::get('/detail', [BlogApiController::class, 'index']);
    Route::get('/{lang}/{slug}', [BlogApiController::class, 'getBySlug']);
    Route::get('/featured', [BlogApiController::class, 'getFeatured']);
});
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

// Country Flag Routes
Route::get('country-flags', [CountryFlagApiController::class, 'index']);
Route::get('country-flags/{id}', [CountryFlagApiController::class, 'show']);
Route::put('country-flags/{id}/toggle-status', [\App\Http\Controllers\Api\CountryFlagApiController::class, 'toggleStatus']);

// Home Cart Two Routes
Route::get('home-cart-twos', [HomeCartTwoApiController::class, 'index']);
Route::get('home-cart-twos/{id}', [HomeCartTwoApiController::class, 'show']);
Route::put('home-cart-twos/{id}/toggle-status', [\App\Http\Controllers\Api\HomeCartTwoApiController::class, 'toggleStatus']);

// Home Hero Routes
Route::get('home-heroes', [\App\Http\Controllers\Api\HomeHeroApiController::class, 'index']);
Route::get('home-heroes/{id}', [\App\Http\Controllers\Api\HomeHeroApiController::class, 'show']);

// Home Section Routes
Route::get('home-sections', [\App\Http\Controllers\Api\HomeSectionApiController::class, 'index']);
Route::get('home-sections/{id}', [\App\Http\Controllers\Api\HomeSectionApiController::class, 'show']);

// Team Routes
Route::get('teams', [\App\Http\Controllers\Api\TeamApiController::class, 'index']);
Route::get('teams/{id}', [\App\Http\Controllers\Api\TeamApiController::class, 'show']);
Route::put('teams/{id}/toggle-status', [\App\Http\Controllers\Api\TeamApiController::class, 'toggleStatus']);

// Our Client Routes
Route::get('our-clients', [\App\Http\Controllers\Api\OurClientApiController::class, 'index']);
Route::get('our-clients/{id}', [\App\Http\Controllers\Api\OurClientApiController::class, 'show']);
Route::put('our-clients/{id}/toggle-status', [\App\Http\Controllers\Api\OurClientApiController::class, 'toggleStatus']);

// Service Type Routes
Route::get('service-types', [\App\Http\Controllers\Api\ServiceTypeApiController::class, 'index']);
Route::get('service-types/{id}', [\App\Http\Controllers\Api\ServiceTypeApiController::class, 'show']);
Route::put('service-types/{id}/toggle-status', [\App\Http\Controllers\Api\ServiceTypeApiController::class, 'toggleStatus']);

// Service Routes
Route::get('services', [\App\Http\Controllers\Api\ServiceApiController::class, 'index']);
Route::get('services/{slug}', [\App\Http\Controllers\Api\ServiceApiController::class, 'show']);
Route::put('services/{id}/toggle-status', [\App\Http\Controllers\Api\ServiceApiController::class, 'toggleStatus']);

// Network Routes
Route::get('networks', [\App\Http\Controllers\Api\NetworkApiController::class, 'index']);
Route::get('networks/{id}', [\App\Http\Controllers\Api\NetworkApiController::class, 'show']);
Route::put('networks/{id}/toggle-status', [\App\Http\Controllers\Api\NetworkApiController::class, 'toggleStatus']);

// Services Hero Routes
Route::get('services-hero', [\App\Http\Controllers\Api\ServicesHeroApiController::class, 'index']);
Route::get('services-hero/{id}', [\App\Http\Controllers\Api\ServicesHeroApiController::class, 'show']);
Route::put('services-hero/{id}/toggle-status', [\App\Http\Controllers\Api\ServicesHeroApiController::class, 'toggleStatus']);

// Blog Hero Routes
Route::get('blog-hero', [\App\Http\Controllers\Api\BlogHeroApiController::class, 'index']);
Route::get('blog-hero/{id}', [\App\Http\Controllers\Api\BlogHeroApiController::class, 'show']);

// Network Hero Routes
Route::get('network-hero', [\App\Http\Controllers\Api\NetworkHeroApiController::class, 'index']);
Route::get('network-hero/{id}', [\App\Http\Controllers\Api\NetworkHeroApiController::class, 'show']);

// Continent Routes
Route::prefix('continents')->group(function () {
    Route::get('/', [ContinentApiController::class, 'index']);
    Route::get('/{id}', [ContinentApiController::class, 'show']);
    Route::get('/{id}/countries', [ContinentApiController::class, 'getCountriesByContinent']);
});