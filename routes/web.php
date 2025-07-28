<?php

use Illuminate\Support\Facades\Route;


// Define a route group with the 'set.locale' middleware
Route::middleware(['set.locale'])->group(function () {
    Route::get('/', fn() => view('welcome'));
    Route::get('lang/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return back();
    })->name('lang.switch');
});
