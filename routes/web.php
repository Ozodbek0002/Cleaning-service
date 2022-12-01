<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PageController::class,'main']);

Route::get('/users',[UserController::class,'index']);

Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/services',[PageController::class, 'services'])->name('services');
Route::get('/projects',[PageController::class, 'projects'])->name('projects');
Route::get('/contact',[PageController::class, 'contact'])->name('contact');

Route::resource('posts', PostController::class);



