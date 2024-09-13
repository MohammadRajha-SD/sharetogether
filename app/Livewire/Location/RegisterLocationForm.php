<?php

namespace App\Livewire\Location;

use Livewire\Component;
class RegisterLocationForm extends Component
{
    public $countries;
    public $states = [];
    public $cities = [];

    public $country;
    public $state;
    public $city;

    public function mount()
    {
        $this->countries = collect(config('location')['countries']);
    }


    public function CountyChanged()
    {
        $country = $this->countries->firstWhere('id', $this->country);
        $this->states = $country['states'] ?? [];
        $this->cities = [];
        $this->state = null;
        $this->city = null;
    }

    public function stateChanged()
    {
        $state = collect($this->states)->firstWhere('id', $this->state);
        $this->cities = $state['cities'] ?? [];
        $this->city = null;
    }

    public function render()
    {
        return view('livewire.location.register-location-form', [
            'countries' => $this->countries,
            'states' => $this->states,
            'cities' => $this->cities,
        ]);
    }
}
