<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TranslationManageController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\SocialshareController;
use App\Http\Controllers\Admin\SocialfooterController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\HomeCartController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\CountryFlagController;
use App\Http\Controllers\Admin\HomeCartTwoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogTypeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ThemeSettingsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactRequestController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\NetworkController;
use App\Http\Controllers\Admin\ContactDataController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\ServicesHeroController;
use App\Http\Controllers\Admin\BlogHeroController;
use App\Http\Controllers\Admin\NetworkHeroController;
use App\Http\Controllers\Admin\NetworkSectionController;
use App\Http\Controllers\Admin\ContinentController;
use App\Http\Controllers\Admin\ContactPhotoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->guard('admin')->check()) {
            return redirect()->route('back.pages.index');
        }
        return redirect()->route('admin.login');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('back.pages.index');
        }
        return redirect()->route('admin.login');
    });

    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login')->middleware('guest:admin');
    Route::post('login', [AdminController::class, 'login'])->name('handle-login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('profile', function () {
            return view('back.admin.profile');
        })->name('admin.profile');

        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::prefix('pages')->name('back.pages.')->group(function () {
            Route::get('index', [PageController::class, 'index'])->name('index');

            Route::resource('translation-manage', TranslationManageController::class);
            Route::get('translation-manage', [TranslationManageController::class, 'index'])->name('translation-manage.index');
            Route::get('translation-manage/create', [TranslationManageController::class, 'create'])->name('translation-manage.create');
            Route::post('translation-manage', [TranslationManageController::class, 'store'])->name('translation-manage.store');
            Route::get('translation-manage/{translation}/edit', [TranslationManageController::class, 'edit'])->name('translation-manage.edit');
            Route::put('translation-manage/{translation}', [TranslationManageController::class, 'update'])->name('translation-manage.update');
            Route::delete('translation-manage/{translation}', [TranslationManageController::class, 'destroy'])->name('translation-manage.destroy');


             // SEO routes
             Route::resource('seo', SeoController::class);
             Route::get('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status');
             Route::post('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status.post');
             Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
             Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
             Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
             Route::get('seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
             Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
             Route::delete('/seo/{seo}', [SeoController::class, 'destroy'])->name('seo.destroy');

             // Logo routes
             Route::resource('logos', LogoController::class);
            Route::get('logos', [LogoController::class, 'index'])->name('logos.index');
            Route::get('logos/create', [LogoController::class, 'create'])->name('logos.create');
            Route::post('logos', [LogoController::class, 'store'])->name('logos.store');
            Route::get('logos/{id}', [LogoController::class, 'show'])->name('logos.show');
            Route::get('logos/{id}/edit', [LogoController::class, 'edit'])->name('logos.edit');
            Route::put('logos/{id}', [LogoController::class, 'update'])->name('logos.update');
            Route::delete('logos/{id}', [LogoController::class, 'destroy'])->name('logos.destroy');


            
             // Social Media routes
             Route::get('social', [SocialMediaController::class, 'index'])->name('social.index');
             Route::get('social/create', [SocialMediaController::class, 'create'])->name('social.create');
             Route::post('social', [SocialMediaController::class, 'store'])->name('social.store');
             Route::get('social/{id}/edit', [SocialMediaController::class, 'edit'])->name('social.edit');
             Route::put('social/{id}', [SocialMediaController::class, 'update'])->name('social.update');
             Route::delete('social/{id}', [SocialMediaController::class, 'destroy'])->name('social.destroy');
             Route::post('social/order', [SocialMediaController::class, 'order'])->name('social.order');
             Route::post('social/toggle-status/{id}', [SocialMediaController::class, 'toggleStatus'])->name('social.toggle-status');

              // Social Share routes
            Route::get('socialshare', [SocialshareController::class, 'index'])->name('socialshare.index');
            Route::get('socialshare/create', [SocialshareController::class, 'create'])->name('socialshare.create');
            Route::post('socialshare', [SocialshareController::class, 'store'])->name('socialshare.store');
            Route::get('socialshare/{id}/edit', [SocialshareController::class, 'edit'])->name('socialshare.edit');
            Route::put('socialshare/{id}', [SocialshareController::class, 'update'])->name('socialshare.update');
            Route::delete('socialshare/{id}', [SocialshareController::class, 'destroy'])->name('socialshare.destroy');
            Route::post('socialshare/order', [SocialshareController::class, 'order'])->name('socialshare.order');
            Route::post('socialshare/{id}/toggle-status', [SocialshareController::class, 'toggleStatus'])->name('socialshare.toggleStatus');

              // Social Footer routes
              Route::get('socialfooter', [SocialfooterController::class, 'index'])->name('socialfooter.index');
              Route::get('socialfooter/create', [SocialfooterController::class, 'create'])->name('socialfooter.create');
              Route::post('socialfooter', [SocialfooterController::class, 'store'])->name('socialfooter.store');
              Route::get('socialfooter/{id}/edit', [SocialfooterController::class, 'edit'])->name('socialfooter.edit');
              Route::put('socialfooter/{id}', [SocialfooterController::class, 'update'])->name('socialfooter.update');
              Route::delete('socialfooter/{id}', [SocialfooterController::class, 'destroy'])->name('socialfooter.destroy');
              Route::post('socialfooter/order', [SocialfooterController::class, 'order'])->name('socialfooter.order');
              Route::post('socialfooter/toggle-status/{id}', [SocialfooterController::class, 'toggleStatus'])->name('socialfooter.toggle-status');



              Route::prefix('home-heroes')->group(function () {
                Route::get('/', [HomeHeroController::class, 'index'])->name('home-heroes.index');
                Route::get('/create', [HomeHeroController::class, 'create'])->name('home-heroes.create');
                Route::post('/', [HomeHeroController::class, 'store'])->name('home-heroes.store');
                Route::get('/{homeHero}/edit', [HomeHeroController::class, 'edit'])->name('home-heroes.edit');
                Route::put('/{homeHero}', [HomeHeroController::class, 'update'])->name('home-heroes.update');
                Route::delete('/{homeHero}', [HomeHeroController::class, 'destroy'])->name('home-heroes.destroy');
                Route::post('home-heroes/order', [HomeHeroController::class, 'order'])->name('home-heroes.order');
                Route::post('home-heroes/toggle-status/{id}', [HomeHeroController::class, 'toggleStatus'])->name('home-heroes.toggle-status');
                
                
            });

            Route::prefix('home-carts')->group(function () {
                Route::get('/', [HomeCartController::class, 'index'])->name('home-carts.index');
                Route::get('/create', [HomeCartController::class, 'create'])->name('home-carts.create');
                Route::post('/', [HomeCartController::class, 'store'])->name('home-carts.store');
                Route::get('/{homeCart}/edit', [HomeCartController::class, 'edit'])->name('home-carts.edit');
                Route::put('/{homeCart}', [HomeCartController::class, 'update'])->name('home-carts.update');
                Route::delete('/{homeCart}', [HomeCartController::class, 'destroy'])->name('home-carts.destroy');
                Route::post('home-carts/order', [HomeCartController::class, 'order'])->name('home-carts.order');
                Route::post('home-carts/toggle-status/{id}', [HomeCartController::class, 'toggleStatus'])->name('home-carts.toggle-status');
            });

            Route::prefix('home-sections')->group(function () {
                Route::get('/', [HomeSectionController::class, 'index'])->name('home-sections.index');
                Route::get('/create', [HomeSectionController::class, 'create'])->name('home-sections.create');
                Route::post('/', [HomeSectionController::class, 'store'])->name('home-sections.store');
                Route::get('/{homeSection}/edit', [HomeSectionController::class, 'edit'])->name('home-sections.edit');
                Route::put('/{homeSection}', [HomeSectionController::class, 'update'])->name('home-sections.update');
                Route::delete('/{homeSection}', [HomeSectionController::class, 'destroy'])->name('home-sections.destroy');
                Route::post('/toggle-status/{id}', [HomeSectionController::class, 'toggleStatus'])->name('home-sections.toggle-status');
            });
            Route::prefix('country-flags')->group(function () {
                Route::get('/', [CountryFlagController::class, 'index'])->name('country-flags.index');
                Route::get('/create', [CountryFlagController::class, 'create'])->name('country-flags.create');
                Route::post('/', [CountryFlagController::class, 'store'])->name('country-flags.store');
                Route::get('/{countryFlag}/edit', [CountryFlagController::class, 'edit'])->name('country-flags.edit');
                Route::put('/{countryFlag}', [CountryFlagController::class, 'update'])->name('country-flags.update');
                Route::delete('/{countryFlag}', [CountryFlagController::class, 'destroy'])->name('country-flags.destroy');
                Route::post('/toggle-status/{id}', [CountryFlagController::class, 'toggleStatus'])->name('country-flags.toggle-status');
            });
            
            Route::prefix('home-cart-twos')->group(function () {
                Route::get('/', [HomeCartTwoController::class, 'index'])->name('home-cart-twos.index');
                Route::get('/create', [HomeCartTwoController::class, 'create'])->name('home-cart-twos.create');
                Route::post('/', [HomeCartTwoController::class, 'store'])->name('home-cart-twos.store');
                Route::get('/{homeCartTwo}/edit', [HomeCartTwoController::class, 'edit'])->name('home-cart-twos.edit');
                Route::put('/{homeCartTwo}', [HomeCartTwoController::class, 'update'])->name('home-cart-twos.update');
                Route::delete('/{homeCartTwo}', [HomeCartTwoController::class, 'destroy'])->name('home-cart-twos.destroy');
                Route::post('/toggle-status/{id}', [HomeCartTwoController::class, 'toggleStatus'])->name('home-cart-twos.toggle-status');
            });

            Route::prefix('services')->group(function () {
                Route::get('/', [ServiceController::class, 'index'])->name('services.index');
                Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
                Route::post('/', [ServiceController::class, 'store'])->name('services.store');
                Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
                Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
                Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
                Route::post('/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
            });

            Route::prefix('blog-types')->group(function () {
                Route::get('/', [BlogTypeController::class, 'index'])->name('blog-types.index');
                Route::get('/create', [BlogTypeController::class, 'create'])->name('blog-types.create');
                Route::post('/', [BlogTypeController::class, 'store'])->name('blog-types.store');
                Route::get('/{blogType}/edit', [BlogTypeController::class, 'edit'])->name('blog-types.edit');
                Route::put('/{blogType}', [BlogTypeController::class, 'update'])->name('blog-types.update');
                Route::delete('/{blogType}', [BlogTypeController::class, 'destroy'])->name('blog-types.destroy');
                Route::post('/toggle-status/{id}', [BlogTypeController::class, 'toggleStatus'])->name('blog-types.toggle-status');
                Route::get('/{blogType}', [BlogTypeController::class, 'show'])->name('blog-types.show');
            });
            
            Route::prefix('blogs')->group(function () {
                Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
                Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
                Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
                Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
                Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
                Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
                Route::post('/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
                Route::post('/delete-image/{blog}/{imageIndex}', [BlogController::class, 'deleteImage'])->name('blogs.delete-image');
            });
            Route::get('theme-settings', [ThemeSettingsController::class, 'index'])->name('theme-settings.index');
            Route::post('theme-settings/update', [ThemeSettingsController::class, 'update'])->name('theme-settings.update');

            // Contact routes
            Route::prefix('contacts')->group(function () {
                Route::get('/', [ContactController::class, 'index'])->name('contact.index');
                Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
                Route::post('/', [ContactController::class, 'store'])->name('contact.store');
                Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
                Route::put('/{contact}', [ContactController::class, 'update'])->name('contact.update');
                Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
                Route::post('/toggle-status/{id}', [ContactController::class, 'toggleStatus'])->name('contact.toggle-status');
            });

            // Contact Requests routes
            Route::prefix('contact-requests')->group(function () {
                Route::get('/', [ContactRequestController::class, 'index'])->name('contact-requests.index');
                Route::get('/{contactRequest}/show', [ContactRequestController::class, 'show'])->name('contact-requests.show');
                Route::delete('/{contactRequest}', [ContactRequestController::class, 'destroy'])->name('contact-requests.destroy');
                Route::post('/toggle-status/{id}', [ContactRequestController::class, 'toggleStatus'])->name('contact-requests.toggle-status');
            });

            Route::prefix('about-pages')->group(function () {
                Route::get('/', [AboutPageController::class, 'index'])->name('about-pages.index');
                Route::get('/create', [AboutPageController::class, 'create'])->name('about-pages.create');
                Route::post('/', [AboutPageController::class, 'store'])->name('about-pages.store');
                Route::get('/{aboutPage}/edit', [AboutPageController::class, 'edit'])->name('about-pages.edit');
                Route::put('/{aboutPage}', [AboutPageController::class, 'update'])->name('about-pages.update');
                Route::delete('/{aboutPage}', [AboutPageController::class, 'destroy'])->name('about-pages.destroy');
                Route::post('/toggle-status/{id}', [AboutPageController::class, 'toggleStatus'])->name('about-pages.toggle-status');
            });

            
            Route::prefix('services-types')->group(function () {
                Route::get('/', [ServiceTypeController::class, 'index'])->name('services-types.index');
                Route::get('/create', [ServiceTypeController::class, 'create'])->name('services-types.create');
                Route::post('/', [ServiceTypeController::class, 'store'])->name('services-types.store');
                Route::get('/{type}/edit', [ServiceTypeController::class, 'edit'])->name('services-types.edit');
                Route::put('/{type}', [ServiceTypeController::class, 'update'])->name('services-types.update');
                Route::delete('/{type}', [ServiceTypeController::class, 'destroy'])->name('services-types.destroy');
                Route::post('/{type}/toggle-status', [ServiceTypeController::class, 'toggleStatus'])->name('services-types.toggle-status');
            });

            Route::prefix('teams')->group(function () {
                Route::get('/', [TeamController::class, 'index'])->name('teams.index');
                Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
                Route::post('/', [TeamController::class, 'store'])->name('teams.store');
                Route::get('/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
                Route::put('/{team}', [TeamController::class, 'update'])->name('teams.update');
                Route::delete('/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
                Route::post('/toggle-status/{id}', [TeamController::class, 'toggleStatus'])->name('teams.toggle-status');
            });

            Route::prefix('networks')->group(function () {
                Route::get('/', [NetworkController::class, 'index'])->name('networks.index');
                Route::get('/create', [NetworkController::class, 'create'])->name('networks.create');
                Route::post('/', [NetworkController::class, 'store'])->name('networks.store');
                Route::get('/{network}/edit', [NetworkController::class, 'edit'])->name('networks.edit');
                Route::put('/{network}', [NetworkController::class, 'update'])->name('networks.update');
                Route::delete('/{network}', [NetworkController::class, 'destroy'])->name('networks.destroy');
                Route::post('/toggle-status/{id}', [NetworkController::class, 'toggleStatus'])->name('networks.toggle-status');
            });

            Route::prefix('contact-data')->group(function () {
                Route::get('/', [ContactDataController::class, 'index'])->name('contact-data.index');
                Route::get('/create', [ContactDataController::class, 'create'])->name('contact-data.create');
                Route::post('/', [ContactDataController::class, 'store'])->name('contact-data.store');
                Route::get('/{contactData}/edit', [ContactDataController::class, 'edit'])->name('contact-data.edit');
                Route::put('/{contactData}', [ContactDataController::class, 'update'])->name('contact-data.update');
                Route::delete('/{contactData}', [ContactDataController::class, 'destroy'])->name('contact-data.destroy');
                Route::post('/toggle-status/{id}', [ContactDataController::class, 'toggleStatus'])->name('contact-data.toggle-status');
            });

            Route::prefix('our-clients')->group(function () {
                Route::get('/', [OurClientController::class, 'index'])->name('our-clients.index');
                Route::get('/create', [OurClientController::class, 'create'])->name('our-clients.create');
                Route::post('/', [OurClientController::class, 'store'])->name('our-clients.store');
                Route::get('/{ourClient}/edit', [OurClientController::class, 'edit'])->name('our-clients.edit');
                Route::put('/{ourClient}', [OurClientController::class, 'update'])->name('our-clients.update');
                Route::delete('/{ourClient}', [OurClientController::class, 'destroy'])->name('our-clients.destroy');
                Route::post('/toggle-status/{id}', [OurClientController::class, 'toggleStatus'])->name('our-clients.toggle-status');
                Route::post('/update-order', [OurClientController::class, 'updateOrder'])->name('our-clients.update-order');
            });

            Route::prefix('services-hero')->group(function () {
                Route::get('/', [ServicesHeroController::class, 'index'])->name('services-hero.index');
                Route::get('/create', [ServicesHeroController::class, 'create'])->name('services-hero.create');
                Route::post('/', [ServicesHeroController::class, 'store'])->name('services-hero.store');
                Route::get('/{servicesHero}/edit', [ServicesHeroController::class, 'edit'])->name('services-hero.edit');
                Route::put('/{servicesHero}', [ServicesHeroController::class, 'update'])->name('services-hero.update');
                Route::delete('/{servicesHero}', [ServicesHeroController::class, 'destroy'])->name('services-hero.destroy');
                Route::post('/toggle-status/{id}', [ServicesHeroController::class, 'toggleStatus'])->name('services-hero.toggle-status');
            });

            // Network Hero Routes
            Route::prefix('network-hero')->name('network-hero.')->group(function () {
                Route::get('/', [NetworkHeroController::class, 'index'])->name('index');
                Route::put('/update', [NetworkHeroController::class, 'update'])->name('update');
                Route::get('/toggle-status', [NetworkHeroController::class, 'toggleStatus'])->name('toggle-status');
            });

            // Blog Hero Routes
            Route::prefix('blog-hero')->name('blog-hero.')->group(function () {
                Route::get('/', [BlogHeroController::class, 'index'])->name('index');
                Route::put('/update', [BlogHeroController::class, 'update'])->name('update');
                Route::get('/toggle-status', [BlogHeroController::class, 'toggleStatus'])->name('toggle-status');
            });

            Route::prefix('network-sections')->name('network-sections.')->group(function () {
                Route::get('/', [NetworkSectionController::class, 'index'])->name('index');
                Route::get('/create', [NetworkSectionController::class, 'create'])->name('create');
                Route::post('/', [NetworkSectionController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [NetworkSectionController::class, 'edit'])->name('edit');
                Route::put('/{id}', [NetworkSectionController::class, 'update'])->name('update');
                Route::delete('/{id}', [NetworkSectionController::class, 'destroy'])->name('destroy');
                Route::get('/toggle-status/{id}', [NetworkSectionController::class, 'toggleStatus'])->name('toggle-status');
            });
            // Continents Routes
Route::prefix('continents')->name('continents.')->group(function () {
    Route::get('/', [ContinentController::class, 'index'])->name('index');
    Route::get('/create', [ContinentController::class, 'create'])->name('create');
    Route::post('/', [ContinentController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ContinentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ContinentController::class, 'update'])->name('update');
    Route::delete('/{id}', [ContinentController::class, 'destroy'])->name('destroy');
    Route::get('/toggle-status/{id}', [ContinentController::class, 'toggleStatus'])->name('toggle-status');
});

            // Contact Photo Routes
            Route::prefix('contact-photos')->name('contact-photos.')->group(function () {
                Route::get('/', [ContactPhotoController::class, 'index'])->name('index');
                Route::get('/create', [ContactPhotoController::class, 'create'])->name('create');
                Route::post('/', [ContactPhotoController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ContactPhotoController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ContactPhotoController::class, 'update'])->name('update');
                Route::delete('/{id}', [ContactPhotoController::class, 'destroy'])->name('destroy');
                Route::get('/toggle-status/{id}', [ContactPhotoController::class, 'toggleStatus'])->name('toggle-status');
            });

        });
        
        
    });
});

// Blog Hero Routes


Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])
    ->name('contact.submit');

Route::delete('/blogs/{blog}/delete-image/{index}', [BlogController::class, 'deleteImage'])
     ->name('back.pages.blogs.delete-image');








