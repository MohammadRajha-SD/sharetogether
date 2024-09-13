<?php

use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\TownController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

    Route::middleware(['auth', 'CheckIfAdmin'])->prefix('admin')->name('admin.')->group(function () {
        /*  Route dashboard admin */
        Route::get('dashboard', function () { return view('admin.index'); })->name('dashboard');

        /* Route Category */
        Route::resource('categories', CategoryController::class);
        Route::resource('sub-categories', SubCategoryController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('states', StateController::class);
        Route::resource('cities', CityController::class);
        Route::resource('towns', TownController::class);

        /* Route Livewire */
        \Livewire\Livewire::setUpdateRoute(function ($handle){
            return Route::post('/livewire/update', $handle);
        });
    });
});
