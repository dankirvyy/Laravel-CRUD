<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;

// Make Posts Index the homepage
Route::get('/', [PostController::class, 'index'])->name('home');

// CRUD routes for posts
Route::resource('posts', PostController::class);

Route::get('/hello', function () {
    return 'Hello Laravel!';
});

Route::get('/hello-view', function () {
    return view('hello');
});

Route::get('/create-post', function () {
    Post::create([
        'title' => 'My First Post',
        'content' => 'Hello, Laravel World!'
    ]);

    return 'Post Created!';
});