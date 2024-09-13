<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostSave extends Component
{
    public $post;
    public $auth_id;
    public $saved = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Post $post)
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
        return view('livewire.posts.post-save',[
            'saveCount' => $this->post->saves()->count()
        ]);
    }
}
