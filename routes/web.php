<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;


Route::get('/', [PageController::class, 'main'])->name('main');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register_store', [AuthController::class, 'register_store'])->name('register.store');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/users', [UserController::class, 'index']);


Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('notification/{notification}/markAsRead', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');
});

Route::get('language/{locale}',);

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    'notifications' => NotificationController::class,
]);

















