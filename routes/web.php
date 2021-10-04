<?php

use App\Models\Article;
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
});


// Get all articles
Route::get('/articles', function () {
    return view('articles', [
        'articles' => Article::all()
    ]);
});

// Get article by slug
Route::get('articles/{article}', function ($slug){
    return view('article', [
        'article' => Article::find($slug)
    ]);
});
