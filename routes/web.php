<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->middleware('auth')
        ->group(function() {
    /**
     * Routes Users
     */

     //Route::any('users/search', [UserController::class, 'search]'])->name('users.search');
     Route::any('users/search', 'UserController@search')->name('users.search');
     Route::resource('users', 'UserController');

    /**
     * Routes Status
     */
    Route::any('status/search', 'StatusController@search')->name('status.search');
    Route::resource('status', 'StatusController');

    /**
     * Routes Systems
     */
    Route::any('systems/search', 'SystemController@search')->name('systems.search');
    Route::resource('systems', 'SystemController');
    /**
     * Routes marks
     */
    Route::any('marks/search', 'MarkController@search')->name('marks.search');
    Route::resource('marks', 'MarkController');
    /**
     * Routes Phones
     */
    Route::any('phones/search', 'PhoneController@search')->name('phones.search');
    Route::resource('phones', 'PhoneController');

    /**
     * Routes Sectors
     */
    Route::any('sectors/search', 'SectorController@search')->name('sectors.search');
    Route::resource('sectors', 'SectorController');
     
});


Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');


