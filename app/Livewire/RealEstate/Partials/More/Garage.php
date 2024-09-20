<?php

namespace App\Livewire\RealEstate\Partials\More;

use Livewire\Component;

class Garage extends Component
{
    public $garage = 0;


    public function garageChanged($garage){
        $this->garage = $garage;
        $this->dispatch('ChangedGarage', $this->garage);
    }

    public function render()
    {
        return view('livewire.real-estate.partials.more.garage');
    }
}
