<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');
Route::post('/contact', ContactMessageController::class)->name('contact.store');
