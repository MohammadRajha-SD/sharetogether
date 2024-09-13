<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $text;
    public $post_id;

    public function mount(Post $post){
        $this->post_id = $post->id;
    }
    
    public function submitComment(){
        $this->validate([
            'text' => 'required|string',
        ]);
        
        $comment = Comment::create([
            'body' => $this->text,
            'post_id' => $this->post_id,
            'user_id' => Auth::id(),
            'parent_id' => null,
        ]);

        $this->dispatch('commentSubmmited', $comment->id);

        $this->reset('text');
    }
    public function render()
    {
        return view('livewire.comments.create');
    }
}
