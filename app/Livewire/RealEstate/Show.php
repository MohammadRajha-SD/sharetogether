<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;
use App\Models\RealEstatePost;

class Show extends Component
{
    protected $listeners   = ['refresh'=> '$refresh'];
    public $real_estate_post;
    public $formData = [];

    public function mount($id)
    {
        $this->real_estate_post = RealEstatePost::findOrFail($id);
        $this->formData = $this->real_estate_post->toArray();

        if ($this->real_estate_post->user_id != auth()->user()->id && $this->real_estate_post->visibility === 0) {
            session()->flash('error', 'Sorry, this real estate post is private.');
            return redirect()->route('real-estate.index');
        }
    }

    // HIDE FUNCTION 
    public function hide($id)
    {
        $post = RealEstatePost::find($id);

        $post->visibility = $post->visibility === 1 ? 0 : 1;
    
        $post->save();

        return redirect()->route('real-estate.show', $id)->with('status', 'Post visibility updated successfully.');
    }

    public function confirmDelete($id)
    {
        RealEstatePost::find($id)->delete();
        
        return redirect()->route('real-estate.index')->with('status', 'Post deleted successfully.');
    }

    public function render()
    {
        return view('livewire.real-estate.show')->extends('frontend.layouts.master');
    }
}
