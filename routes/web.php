<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', WelcomeController::class);

Route::prefix('contact')->group(function () {
    Route::controller(ContactController::class)->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'show')->name('show');
    });
});

Route::get('/company/{name?}', function ($name = null) {
    if ($name) {
        return 'company ' . $name;
    }
    else {
        return 'all companies';
    }
})->whereAlphaNumeric('name');

Route::fallback(function () {
    return 'sorry, this page does not exists';
});