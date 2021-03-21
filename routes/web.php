<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //== require('TestController')

use Laravel\Socialite\Facades\Socialite;
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

Route::get('posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show')->middleware('auth');

Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

//Route::get('test3', 'App\Http\Controllers\TestController@testAction'); just for learning

// Route::get('/test', function () {
//     $posts = [
//         ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-13'],
//         ['id' => 2, 'title' => 'JS', 'posted_by' => 'Mohamed', 'created_at' => '2021-03-25'],
//     ];
//     return view('test', [
//         'posts' => $posts
//     ]);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/auth/redirect', function () {
    // dd('i am in auth/redirect');
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});