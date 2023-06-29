<?php

use Illuminate\Support\Facades\Route;

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

Route::controller(App\Http\Controllers\PostcardController::class)->group(function () {
    Route::get('/', 'index')->name('postcards.index');
    

    // Delete Postcard
    Route::delete('/postcards/{postcard}', [PostcardController::class, 'destroy'])->middleware('auth');

    // Single Postcard   
    Route::get('/postcards/{postcard}', 'show')->name('postcards.show');
    Route::get('/sitemap.xml', 'PostcardController@index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
