<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/products', [
    ProductController::class,
    'index',
]);

Route::get('/articles/detail/{id}', [
    ArticleController::class,
    'detail',
]);

Route::get('/', [
    ArticleController::class, 'index'
]);


Route::get('/articles/add', [ArticleController::class, 'add']);

// Add new Article
Route::post('/articles/add', [
    ArticleController::class,
    'create',
]);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/create', [ArticleController::class, 'update']);

// Delete article
Route::get('/articles/delete/{id}', [
    ArticleController::class,
    'delete',
]);

Route::post('/comments/add', [
    CommentController::class,
    'create',
]);

Route::get('/comments/delete/{id}', [
    CommentController::class,
    'delete',
]);
Auth::routes();

