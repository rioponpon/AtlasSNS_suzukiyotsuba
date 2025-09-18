<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use App\View\Components\LoginLayout;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

// Route::get('/users', function () {
//   return view('users.index');
// });


require __DIR__ . '/auth.php';




Route::group(['middleware' => 'auth'], function() {

Route::get('/top', [PostsController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('users/{id}/profile', [UsersController::class, 'show'])->name('users.show');


//Route::get('/search', [UsersController::class, 'index'])->name('search.index');
Route::get('/search', [UsersController::class, 'search'])->name('users.index');



Route::get('/follow-list', [PostsController::class, 'index']);
Route::get('/follower-list', [PostsController::class, 'index']);

Route::get('/follow-list', [FollowsController::class, 'followList']);
Route::get('/follower-list', [FollowsController::class, 'followerList']);

Route::get('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
Route::get('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');

Route::get('/added', [RegisteredUserController::class, 'added'])->name('added');


Route::get('/top', [PostsController::class, 'index'])->name('posts.index');
Route::post('/top', [PostsController::class, 'postCreate'])->name('posts.create');


Route::get('/profile/{id}/update-form', [UsersController::class, 'profileUpdate']);
//編集処理
Route::post('/profile/update', [UsersController::class, 'profileUpdate']);


Route::get('/post/{id}/update-form', [PostsController::class, 'updateForm']);
//編集処理
Route::post('/post/update', [PostsController::class, 'update']);

//削除
Route::get('/post/{id}/delete', [PostsController::class, 'delete']);
});

Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
