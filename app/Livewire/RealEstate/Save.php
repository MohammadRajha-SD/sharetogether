<?php

namespace App\Livewire\RealEstate;

use App\Models\RealEstatePost;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Save extends Component
{
    public $post;
    public $auth_id;
    public $saved = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(RealEstatePost $post)
    {
        $this->auth_id = Auth::id();
        $this->post = $post;
        $this->saved = $post->isSavedByUser($this->auth_id);
    }   

    public function save()
    {
        if (!$this->saved) {
            $this->post->saves()->create(['user_id' => $this->auth_id]);
            $this->saved = true;
            $this->dispatch('refresh');
        }
    }

    public function unsave()
    {
        if ($this->saved) {
            $this->post->saves()->where('user_id', $this->auth_id)->delete();
            $this->saved = false;
            $this->dispatch('refresh');
        }
    }

    public function render()
    {
        return view('livewire.real-estate.save');
    }
}
