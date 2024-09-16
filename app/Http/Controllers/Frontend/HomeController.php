<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Community;

class HomeController extends Controller
{
    public function index(Category $category) {

        return view('frontend.index', ['category' => $category]);
    }
}
