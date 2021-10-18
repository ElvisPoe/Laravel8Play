<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6), //$this->getPosts(),
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /* Junk but keep it */
    protected function getPosts(){
        $posts = Post::latest();
        if(request('search')){
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return $posts->get();
    }
}
