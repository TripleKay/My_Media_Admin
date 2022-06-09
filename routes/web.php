<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    //admin
    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::post('admin/update',[ProfileController::class,'updateProfile'])->name('admin#update');
    Route::get('admin/editPassword',[ProfileController::class,'editPassword'])->name('admin#editPassword');
    Route::post('admin/updatePassword',[ProfileController::class,'updatePassword'])->name('admin#updatePassword');

    //admin list
    Route::get('admin/list',[ListController::class,'index'])->name('admin#list');
    Route::get('admin/delete/{id}',[ListController::class,'deleteAccount'])->name('admin#deleteAccount');
    Route::post('admin/list',[ListController::class,'searchAccount'])->name('admin#searchAccount');

    //category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin#editCategory');
    Route::post('category/update/{id}',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');
    Route::get('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
    Route::post('category',[CategoryController::class,'searchCategory'])->name('admin#searchCategory');

    //post
    Route::get('post',[PostController::class,'index'])->name('admin#post');
    Route::post('post/create',[PostController::class,'createPost'])->name('admin#createPost');
    Route::get('post/edit/{id}',[PostController::class,'editPost'])->name('admin#editPost');
    Route::post('post/update/{id}',[PostController::class,'updatePost'])->name('admin#updatePost');
    Route::get('post/delete/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    Route::post('post',[PostController::class,'searchPost'])->name('admin#searchPost');

    //trend-post
    Route::get('trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
    Route::get('trendPost/detail/{id}',[TrendPostController::class,'trendPostDetail'])->name('admin#trendDetail');
});
