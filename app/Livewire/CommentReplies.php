<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CommentReplies extends Component
{
    public $comment;
    public $replies;
    public $perPage = 2;
    public $hasMoreReplies = true;

    public $message;

    public $listeners = ['replysubmitted' => 'onReplySubmitted'];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->replies = new Collection();
//        $this->replies = $comment->replies()->latest()->take($this->perPage)->get();
        $this->checkForMoreReplies();
    }

    public function loadMoreReplies()
    {
        $this->replies = $this->comment->replies()->latest()->take($this->perPage)->get();
        $this->perPage += 3;
        $this->checkForMoreReplies();
    }

    private function checkForMoreReplies()
    {
        $this->hasMoreReplies = $this->comment->replies()->count() > $this->replies->count();
    }

    public function onReplySubmitted($reply_id)
    {
        $reply = Comment::find($reply_id);
        if ($reply && $reply->parent_id == $this->comment->id) {
            $this->replies->prepend($reply);
        }
    }

    public function submitReply()
    {
        $this->validate([
            'message' => 'required|string|max:1000',
        ]);

        $reply = Comment::create([
            'body' => $this->message,
            'user_id' => Auth::id(),
            'post_id' => $this->comment->post_id,
            'parent_id' => $this->comment->id,
        ]);

        $this->replies->prepend($reply);

        $this->reset('message');
    }

    public function render()
    {
        return view('livewire.posts.comment-replies', [
            'comment_counted' => (count($this->comment->replies) - count($this->replies))
        ]);
    }
}
