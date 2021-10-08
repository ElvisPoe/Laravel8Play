<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');



// Articles
Route::get('/articles', function () {
    return view('articles.index', [
        'articles' => Article::all()
    ]);
})->name('articles.index');

Route::get('articles/{article}', function ($slug){
    return view('articles.show', [
        'article' => Article::find($slug)
    ]);
})->name('articles.show');


// Posts
Route::get('/posts', function () {
    return view('posts.index', [
        'posts' => Post::latest()->get()
    ]);
})->name('posts.index');

Route::get('posts/{post}', function (Post $post){ // posts/{post:slug}
    return view('posts.show', [
        'post' => $post
    ]);
})->name('posts.show');

// Post Categories
Route::get('categories/{category:slug}', function (Category $category){
    return view('posts.index', [
        'posts' => $category->posts
    ]);
})->name('categories.show');


// Post Author
Route::get('author/posts/{author:username}', function (User $author){
    return view('posts.index', [
        'posts' => $author->posts
    ]);
})->name('authors.show');
