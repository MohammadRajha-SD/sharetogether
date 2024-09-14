<?php

namespace App\Livewire\Chats\Communities;

use App\Models\Community;
use Livewire\Component;

class Join extends Component
{

    public $communities;
    public $community;

    public function mount()
    {
        $this->communities = Community::all() ?? collect();
        $this->community = collect();
    }

    public function joinCommunity($id)
    {
        $community = Community::findOrFail($id);

        $user = auth()->user();

        if (!$user->communities->contains($community->id)) {
            $user->communities()->attach($community->id);
        }

        return redirect()->route('community.chat', ['slug' => $community->slug]);
    }

    public function render()
    {
        return view('livewire.chats.communities.join');
    }
}
