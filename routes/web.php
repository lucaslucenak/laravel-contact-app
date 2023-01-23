<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ActivityController;

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

// Create all the routes when the Controller was created usind the 'php artisan make:controller ControllerNmae -r'
// Route::resource('/company', CompanyController::class);
// Or this

Route::resources([
    '/company' => CompanyController::class,
    '/tag' => TagController::class,
    '/task' => TaskController::class,
    '/activity' => ActivityController::class
]);

Route::resource('/contact.notes', ContactNotesController::class)->shallow();

Route::fallback(function () {
    return 'sorry, this page does not exists';
});