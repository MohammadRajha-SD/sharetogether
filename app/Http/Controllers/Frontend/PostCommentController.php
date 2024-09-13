<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
        
        Comment::create([
            'body' => $request->body,
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
        ]);
    
        return redirect()->back();
    }
    
}
