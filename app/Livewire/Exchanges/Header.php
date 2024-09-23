<?php

namespace App\Livewire\Exchanges;

use Livewire\Component;

class Header extends Component
{
    public $latitude;
    public $longitude;
    public $address = null;

    protected $listeners = ['updateLocation'];

    public function updateLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function render()
    {
        return view('livewire.exchanges.header');
    }
}
