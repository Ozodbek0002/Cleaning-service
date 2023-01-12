<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;



Route::get('/', [PageController::class,'main'])->name('main');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/users',[UserController::class,'index']);

Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/services',[PageController::class, 'services'])->name('services');
Route::get('/projects',[PageController::class, 'projects'])->name('projects');
Route::get('/contact',[PageController::class, 'contact'])->name('contact');


Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);

















