<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\SettingsController;
use App\Http\Controllers\Frontend\RealEstatePostController;
use App\Http\Controllers\Frontend\CommunityController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::middleware(['auth'])->group(function () {
        // Route Livewire
        \Livewire\Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        // posts & comments
        Route::get('/', [PostController::class, 'index'])->name('home');
        Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
        Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('posts.comment');

        // user profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/profile/location', [ProfileController::class, 'updateLocation'])->name('profile.location.update');
        Route::patch('/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image.update');

        // settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');

        // Real Estate Posts Routes
        Route::resource('real-estate', RealEstatePostController::class);

        Route::get('/communities', [CommunityController::class, 'index'])->name('community.index');
        Route::post('/communities/join/{id}', [CommunityController::class, 'joinCommunity'])->name('community.join');
        Route::get('/communities/chat/{id}', [CommunityController::class, 'chat'])->name('community.chat');

    });

    Route::get('/test', function () {
        return view('frontend.test');
    });


    require __DIR__ . '/auth.php';
    require __DIR__ . '/oauth.php';

    Route::get('/get-states/{country_id}', [LocationController::class, 'getStates']);
    Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);
});

/*
// * Main categories button make easier to get categories
// * Add Instruments and fix it
// * Flute. The flute is a perennial favorite in school bands.
// * Clarinet. The clarinet is another prevalent choice among students. ...
// * Saxophone Trumpet. Trombone.Percussion (Drums) Violin. Guitar.
 Also please add this into Homeless

 1.Short-term street friends, unemployed or other accidental loss of housing
 2.Long-term street dwellers forming settlements
 3.Need help get rid off drug addiction or mental trauma

    Each one has their own community

 */


