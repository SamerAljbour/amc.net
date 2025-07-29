<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
