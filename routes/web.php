<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/{category:name?}', [HomeController::class, 'index'])->name('home');
Route::get('/news/{id}', [HomeController::class, 'details'])->name('news.details');
Route::get('/category/{category:name}', [NewsController::class, 'showByCategory'])->name('news.category');


// Route::get('/category/{category}', [NewsController::class, 'showByCategory'])->name('news.category');
// search result 
Route::get('/article/{value}', [SearchController::class, 'show']);
