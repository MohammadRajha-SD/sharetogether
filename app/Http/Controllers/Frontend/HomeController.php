<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Community;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::all();
        $categories = Category::where('parent_id', null)->get();

        return view('frontend.index', compact('categories', 'posts'));
    }
}
