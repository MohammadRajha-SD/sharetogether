<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Category $category) {

        return view('frontend.posts.index', ['category' => $category]);
    }

    public function show(Post $post) {
        return view('frontend.posts.show', [
            'post' => $post
        ]);
    }
}
