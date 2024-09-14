<?php
// app/Http/Livewire/Chats/Communities/Chat.php

namespace App\Livewire\Chats\Communities;

use Livewire\Component;
use App\Models\Community;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $communityName;
    public $messages;
    public $communityId;
    public $message;
    public $page = 1;
    public $hasMoreMessages = true;
    public $messagesPerPage = 20;

    public function mount($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();
        $this->communityId = $community->id;
        $this->communityName = $community->name;
        $this->loadMessages();
    }

 
    public function loadMessages()
    {
        $offset = ($this->page - 1) * $this->messagesPerPage;

        $this->messages = Message::where('community_id', $this->communityId)
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($this->messagesPerPage)
            ->get()
            ->reverse();

        if ($this->messages->count() < $this->messagesPerPage) {
            $this->hasMoreMessages = false;
        }
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|max:255',
        ]);

        Message::create([
            'community_id' => $this->communityId,
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->message = '';
        
        $this->emit('messageSent');
    }

    public function loadMoreMessages()
    {
        if ($this->hasMoreMessages) {
            $this->page++;
            $this->loadMessages();
        }
    }

    public function render()
    {
        return view('livewire.chats.communities.chat')->layout('frontend.layouts.master');
    }
}
