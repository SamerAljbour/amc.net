<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


// Define a route group with the 'set.locale' middleware
Route::middleware(['set.locale'])->group(function () {
    Route::get('/', fn() => view('welcome'));
    Route::get('lang/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return back();
    })->name('lang.switch');

    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
});
