<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RealEstatePost;

class RealEstatePostController extends Controller
{
    public function index()
    {
        $real_estate_posts = RealEstatePost::paginate(6);
        return view('frontend.real-estate.index', compact('real_estate_posts'));
    }

    public function show(string $id)
    {
        $real_estate_post = RealEstatePost::findOrFail($id);
        return view('frontend.real-estate.show', compact('real_estate_post'));
    }
}
