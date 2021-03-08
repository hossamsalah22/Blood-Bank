<?php

namespace App\Http\Controllers\Front\Ar;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('front/ar.posts', compact('posts'));
    }

    public function show($id)
    {
        $model = Post::findOrFail($id);
        return view('front/ar.post', compact('model'));
    }

    
}
