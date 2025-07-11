<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/galeri', function () {
    return view('pages.galeri');
});
Route::get('/artikel', function () {
    return view('pages.artikel');
});
