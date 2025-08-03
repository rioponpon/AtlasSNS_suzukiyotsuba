<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

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
Route::get('/login', function () {
  return view('layouts.login');
});

Route::get('/users', function () {
  return view('users');
});


require __DIR__ . '/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create']);

Route::get('/top', [PostsController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/search', [UsersController::class, 'index']);

Route::get('/follow-list', [PostsController::class, 'index']);
Route::get('/follower-list', [PostsController::class, 'index']);


Route::get('/users', [UsersController::class, 'users']);
