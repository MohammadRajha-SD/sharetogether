<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;
use App\Models\RealEstatePost;

class Show extends Component
{
    public $real_estate_post;

    public function mount($id)
    {

        $this->real_estate_post = RealEstatePost::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.real-estate.show')->extends('frontend.layouts.master');
    }
}
