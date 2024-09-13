<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
// use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\User;
use App\Services\LocationService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// Route::get('/', function() {
//     $tr = new GoogleTranslate('ar');
//     $txt = $tr->translate('How are you?');
//     return $txt;
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function() {
        
    Route::get('/', [HomeController::class, 'index'])->name('home');

   
    Route::get('categories/{slug}', function($slug) {
        $selected_category = Category::where('slug', $slug)->first()->children;
        $categories = Category::where('parent_id', null)->get();
        return view('frontend.index', compact('categories', 'selected_category'));
    })->name('categories');


    Route::get('/test', function() {
        $categories = Category::where('parent_id', null)->get();
        return view('frontend.test', compact('categories'));
    });


    Route::get('/users', function(){
        $users = User::with(['details', 'interests'])->get();
        return view('index', compact('users'));
    });


    Route::get('/dashboard', function () { 
        return view('dashboard'); 
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';

    // how to visible it as map
    // and make function to it 

    // TO FIND LOCATION AND DISTANCE
    Route::get('/test1', function(){
        $user = User::findOrFail(1)->details;
        $currentUser = User::findOrFail(2)->details;
        $locationService = new LocationService();
        $distance = $locationService->calculateDistance($user->latitude, $user->longitude, $currentUser->latitude, $currentUser->longitude,);
        @dd([
            $user,
            json_decode($locationService->getGeoLocation($user->latitude, $user->longitude)->content()), 
            $distance . ' km'
        ]);
    });
        
});

/** Google OAuth routes */
Route::get('/auth/google/redirect', [GoogleController::class, 'handleGoogleRedirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

/** Facebook OAuth routes */
Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleFacebookRedirect'])->name('auth.facebook.redirect');
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);