<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::get('categoryList',[AuthController::class,'categoryList'])->middleware('auth:sanctum');

//post
Route::get('post',[PostController::class,'postList']);
Route::post('post/search',[PostController::class,'searchPost']);
Route::post('post/detail',[PostController::class,'postDetail']);

//category
Route::get('category',[CategoryController::class,'categoryList']);
Route::post('category/search',[CategoryController::class,'searchCategory']);