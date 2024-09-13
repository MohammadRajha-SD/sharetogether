<?php
namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLike extends Component
{
    public $post;
    public $auth_id;
    public $liked = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->auth_id = Auth::id();
        $this->liked = $post->isLikedByUser($this->auth_id);
    }

    public function like()
    {
        if (!$this->liked) {
            $this->post->likes()->create(['user_id' => $this->auth_id]);
            $this->liked = true;
            $this->dispatch('refresh');
        }
    }

    public function unlike()
    {
        if ($this->liked) {
            $this->post->likes()->where('user_id', $this->auth_id)->delete();
            $this->liked = false;
            $this->dispatch('refresh');
        }
    }

    public function render()
    {
        return view('livewire.posts.post-like', [
            'likeCount' => $this->post->likes()->count()
        ]);
    }
}
