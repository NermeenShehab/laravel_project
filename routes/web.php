<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => ['auth'] ], function() {
Route::get('posts',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// use Laravel\Socialite\Facades\Socialite;

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();

//     // $user->token
// });

Route::get('/auth/github/redirect', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/auth/github/callback', [LoginController::class, 'handleGithubCallback']);
Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
