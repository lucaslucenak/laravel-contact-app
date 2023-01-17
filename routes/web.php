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

function getContacts() {
    return [
        1 => ['id' => 1, 'name' => 'Lucas', 'phone' => '123123'],
        2 => ['id' => 2, 'name' => 'Siqueira', 'phone' => '1231234'],
        3 => ['id' => 3, 'name' => 'Arruda', 'phone' => '12312345']
    ];
}

Route::get('/', function () {
    return redirect('/contact');
});

Route::prefix('contact')->group(function () {
    Route::get('/', function () {
        return view('contact.index')->with('contacts', getContacts());
    })->name('contact.index');
    
    Route::get('/{id}', function ($id) {
    abort_if(!isset(getContacts()[$id]), 404);
        return view('contact.show')->with('contact', getContacts($id));
    })->name('contact.show');
    
    Route::get('/create', function () {
        return view('contact.create');
    })->name('contact.create');
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