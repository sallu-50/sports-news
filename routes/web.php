<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{id}', [HomeController::class, 'details'])->name('news.details');
// search result 
Route::get('/article/{value}', [SearchController::class, 'show']);



// Route::get('/', [NewsController::class, 'index'])->name('home');
// Route::get('/news/{category}', [NewsController::class, 'getNews'])->name('news.category');
// Route::get('/search', [HomeController::class, 'search'])->name('news.search');
// routes/web.php



// News details page route
// Route::get('/news-details', [NewsController::class, 'news'])->name('news.details');

// Route::get('/news', [NewsController::class, 'index'])->name('news.index');
