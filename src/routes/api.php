<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

/* |-------------------------------------------------------------------------- | API Routes |-------------------------------------------------------------------------- | | Here is where you can register API routes for your application. These | routes are loaded by the RouteServiceProvider and all of them will | be assigned to the "api" middleware group. Make something great! | */
Route::prefix('/post')->group(function () {
    Route::get('/getList', [PostsController::class , 'getList']);

    Route::get('/getBy', [PostsController::class , 'getBy']);

    Route::post('/save', [PostsController::class , 'save']);

    Route::post('/delete', [PostsController::class , 'delete']);
});