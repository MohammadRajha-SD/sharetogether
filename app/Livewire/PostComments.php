<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component
{
    public $post;
    public $comments;
    public $perPage = 5;
    public $hasMoreComments;

    public $body;
    public $post_id;

    public function mount(Post $post)
    {
        $this->post_id = $post->id;
        $this->post = $post;
        $this->comments = $post->comments()->whereNull('parent_id')->latest()->take($this->perPage)->get();
        $this->checkForMoreComments();
    }

    public function loadMoreComments()
    {
        $this->perPage += 5;
        $this->comments = $this->post->comments()->whereNull('parent_id')->latest()->take($this->perPage)->get();
        $this->checkForMoreComments();
    }

    private function checkForMoreComments()
    {
        $this->hasMoreComments = $this->post->comments()->whereNull('parent_id')->count() > $this->comments->count();
    }

    public function submitReply($comment_id)
    {
        $this->validate([
            'body' => 'required|string|max:1000',
        ]);

        $reply = Comment::create([
            'body' => $this->body,
            'user_id' => Auth::id(),
            'post_id' => $this->post_id,
            'parent_id' => $comment_id,
        ]);

        $this->dispatch('replysubmitted', $reply->id);

        $this->reset('body');
    }

    public function render()
    {
        return view('livewire.posts.post-comments');
    }
}
