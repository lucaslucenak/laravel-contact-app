<?php

use App\Http\Controllers\ContactController;
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
    return view('welcome.welcome');
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
    
    Route::get('/{id}', [ContactController::class, 'show'])->name('contact.show');
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