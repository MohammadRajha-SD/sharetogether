<?php

namespace App\Livewire\Exchanges;

use Livewire\Component;

class Main extends Component
{
    public $id = null;
    public function mount($id = null)
    {
        if ($id !== null) {
            $this->id = $id;
        }
    }
    public function render()
    {
        return view('livewire.exchanges.main')->extends('frontend.layouts.master');
    }
}
