<?php

namespace App\Livewire\RealEstate\Partials;

use Livewire\Component;

class Search extends Component
{
    public $search;

    public function submit()
    {
        $this->dispatch('RealStateSearch', $this->search);
    }

    public function render()
    {

        return view('livewire.real-estate.partials.search');
    }
}
