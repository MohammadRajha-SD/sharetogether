<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;

class MyRealEstatePosts extends Component
{
    public $real_estate_posts;
    public $is_favorite = false;

    public function mount()
    {
        $this->load_my_real_estate_posts();
    }

    public function load_my_real_estate_posts()
    {
        $this->real_estate_posts = auth()->user()->real_estate_posts()->get();
        $this->is_favorite =false;
    }
    public function load_favorite_real_estate_posts()
    {
        $this->real_estate_posts = auth()->user()->favorite_real_estate_posts()
            ->where('visibility', 1)
            ->get();
        $this->is_favorite =true;
    }

    public function render()
    {
        return view('livewire.real-estate.my-real-estate-posts');
    }
}
