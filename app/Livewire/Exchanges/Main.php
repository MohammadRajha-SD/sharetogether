<?php

namespace App\Livewire\Exchanges;

use Livewire\Component;

class Main extends Component
{
    
    public function render()
    {
        return view('livewire.exchanges.main')->extends('frontend.layouts.master');
    }
}
