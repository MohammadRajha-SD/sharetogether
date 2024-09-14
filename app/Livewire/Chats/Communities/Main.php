<?php

namespace App\Livewire\Chats\Communities;

use Livewire\Component;
use App\Models\Community;

class Main extends Component
{

    public $community;
    
    public function mount($slug){
        $this->community = Community::where('slug', $slug)->firstOrFail() ?? collect();
    }
    
    public function render()
    {
        return view('livewire.chats.communities.main')->extends('frontend.layouts.master');
    }
}
