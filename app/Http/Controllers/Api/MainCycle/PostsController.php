<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('category')->where(
            function ($query) use ($request)
            {
                if ($request->has('category_id')) {
                    $query->where('category_id', $request->category_id);
                }
            }
        )->paginate(10);

        return responseJson(1, 'Success', $posts);
    }

    public function favouration(Request $request) 
    {
        $data = [
            'post_id' => 'required|exists:posts, id',
        ];

        $validator = Validator()->make($request->all(), $data);
        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'Success', $toggle);
    }

    public function favourites(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(10);
        return responseJson(1, 'your favourite posts', $posts);
    }
}
