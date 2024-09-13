<?php

namespace App\Livewire\Location;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Form extends Component
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
        $user = Auth::user();
        if ($user && $user->details()->exists()) {
            $this->country = $user->details->country_id;
            $this->CountyChanged();
            $this->state =$user->details->state;
            $this->stateChanged();
            $this->city =$user->details->city;
        }
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

    public function updateLocation()
    {
        // Validate the data
        $validatedData = $this->validate([
            'country' => 'required|integer',
            'state' => 'required|integer',
            'city' => 'required|integer',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update or create the user's details
        $user->details()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
            ]
        );

        return redirect()->route('profile.index')->with('status', 'Location updated successfully.');
    }

    public function render()
    {
        return view('livewire.location.form', [
            'countries' => $this->countries,
            'states' => $this->states,
            'cities' => $this->cities,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city
        ]);
    }
}
