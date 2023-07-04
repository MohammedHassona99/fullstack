<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ImageLibraryController;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
});
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::post('/formPost', [HomepageController::class, 'formContact'])->name('formPost');
Route::view('/gov-ser', 'pages.gov-ser')->name('gov-ser');
Route::get('/news', [HomepageController::class, 'news'])->name('news');
Route::get('/course', [HomepageController::class, 'course'])->name('course');
Route::post('/trainee', [HomepageController::class, 'add_trainee'])->name('add_trainee');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/imagesLibrary', [ImageLibraryController::class, 'index'])->name('images_library');

Route::group(['prefix' => 'dashboard/news'], function () {
    Route::get('/', [DashboardController::class, 'show_news'])->name('show_news');
    Route::any('/add', [DashboardController::class, 'add_news'])->name('add_news');
    Route::any('/edit/{id}', [DashboardController::class, 'edit_news'])->name('edit_news');
});
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/courses', [DashboardController::class, 'show_course'])->name('show_course');
    Route::any('/course/add', [DashboardController::class, 'add_course'])->name('add_course');
    Route::any('/course/edit/{id}', [DashboardController::class, 'edit_course'])->name('edit_course');
});

Route::any('/post/{id}', [HomepageController::class, 'single_post'])->name('post');
Route::get('/dashboard/category', [DashboardController::class, 'show_category'])->name('show_category');
Route::any('/dashboard/category/add', [DashboardController::class, 'add_category'])->name('add_category');

Route::post('/api/get_cats/', [ApiController::class, 'get_cats'])->name('get_cats_api');
Route::post('/api/delete_cat/{id}', [ApiController::class, 'delete_cat'])->name('delete_cat_api');
Route::post('/api/delete_post/{id}', [ApiController::class, 'delete_post'])->name('delete_post');
Route::post('/api/delete_course/{id}', [ApiController::class, 'delete_course'])->name('delete_course');
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'redirect']);
