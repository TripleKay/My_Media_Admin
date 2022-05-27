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

    //category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');

    //post
    Route::get('post',[PostController::class,'index'])->name('admin#post');

    //trend-post
    Route::get('trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');



});