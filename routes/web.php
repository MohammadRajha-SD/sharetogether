<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\SettingsController;
use App\Http\Controllers\Frontend\RealEstatePostController;
use App\Livewire\Chats\Communities\Main as ChatCommunity;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::middleware(['auth'])->group(function () {
        // Route Livewire
        \Livewire\Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
        
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // posts & comments
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
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

        Route::get('/communities/chat/{slug}', ChatCommunity::class)->name('community.chat');
    });

    Route::get('/test', function () {
        return view('frontend.test');
    });

    require __DIR__ . '/auth.php';
    require __DIR__ . '/oauth.php';

    Route::get('/get-states/{country_id}', [LocationController::class, 'getStates']);
    Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);
});

