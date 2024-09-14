<?php

namespace App\Livewire\Chats\Communities;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Events\MessageSent;
use Livewire\Attributes\On;

class Chat extends Component
{
    use WithPagination;

    public $communityId;
    public $communityName;
    public $messages;
    public $message;
    public $hasMoreMessages = true;
    public $limit = 6;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($community)
    {
        $this->communityId = $community->id;
        $this->communityName = $community->name;
        $this->messages = new Collection();
        $this->message = '';
        $this->loadMessages();
    }


    public function loadMessages()
    {
        $query = Message::where('community_id', $this->communityId)->orderBy('created_at', 'desc');
        $messages = $query->paginate($this->limit);

        $this->messages = $this->messages->merge($messages->items());

        $this->hasMoreMessages = $messages->hasMorePages();

        if ($this->hasMoreMessages) {
            $this->limit += $this->limit;
        }
    }

    public function sendMessage()
    {
        if($this->message !== '')
        {
            $chatMessage = Message::create([
                'community_id' => $this->communityId,
                'user_id' => Auth::id(),
                'message' => $this->message,
            ]);

            $this->messages->prepend($chatMessage);

            broadcast(new MessageSent($chatMessage))->toOthers();

            $this->message = '';
        }
    }

    #[On('echo-private:community-channel.{communityId},MessageSent')]
    public function listenForMessage($event)
    {
        $msg = Message::findOrFail($event['message']['id']);
        $this->messages->prepend($msg);
        $this->dispatch('refresh');
    }

    public function render()
    {

        return view('livewire.chats.communities.chat');
    }
}
