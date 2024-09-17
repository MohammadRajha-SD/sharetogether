<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;

class Main extends Component
{
    
    public function render()
    {
        return view('livewire.real-estate.main')->extends('frontend.layouts.master');
    }
}
