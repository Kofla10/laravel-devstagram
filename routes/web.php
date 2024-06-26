<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FolloweController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogouthController;
use App\Http\Controllers\RegisterController;


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

Route::get('/',HomeController::class)->name('home');

Route::get('/edit-perfil', [EditController::class, 'index'])->name('edit.perfil');
Route::post('/edit-perfil', [EditController::class, 'store'])->name('edit.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogouthController::class, 'index'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/imagens', [ImagenController::class, 'store'])->name('imagens.store');

Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comment.add');

Route::post('/like/{post}', [LikeController::class, 'store'])->name('like.post');
Route::delete('/like/{post}', [LikeController::class, 'destroy'])->name('delete.like');

Route::post('/flollow/{user}', [FolloweController::class, 'store'])->name('follow');
Route::delete('/flollow/{user}', [FolloweController::class, 'destroy'])->name('delete.follower');

