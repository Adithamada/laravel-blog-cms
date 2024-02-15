<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});
Route::get('/blogs', function () {
    return view('home.blog-list');
});
Route::get('/single-blog', function () {
    return view('home.single-blog');
});
Route::get('/author', function () {
    return view('home.author');
});

Route::get('/backoffice', [LoginController::class, 'index'])->name('index-login')->middleware('guest');
Route::post('/backoffice', [LoginController::class, 'authenticate'])->name('auth-login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/', [HomeController::class, 'index'])->name('index-home');
Route::get('/blog', [HomeController::class, 'blogs'])->name('list-blog');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('list-category');
Route::get('/blog/{title}', [HomeController::class, 'show'])->name('show-blog');
Route::get('/load-more', [BlogController::class, 'loadMore'])->name('load-more');


Route::get('/dashboard/{user_id}', [DashboardController::class, 'index'])->name('index-dashboard')->middleware('auth');

Route::get('/manage-blog/{user_id}', [BlogController::class, 'index'])->name('index-blog')->middleware('auth');
Route::post('/manage-blog/create', [BlogController::class, 'store'])->name('create-blog');
Route::patch('/manage-blog/{id}', [BlogController::class, 'update'])->name('update-blog');

Route::get('/manage-category/{user_id}', [CategoryController::class, 'index'])->name('index-category')->middleware('auth');
Route::post('/manage-category/create', [CategoryController::class, 'store'])->name('create-category');

Route::get('/manage-user/{user_id}', [UserController::class, 'index'])->name('index-user')->middleware('auth');
Route::post('/manage-user/create', [UserController::class, 'store'])->name('create-user');
