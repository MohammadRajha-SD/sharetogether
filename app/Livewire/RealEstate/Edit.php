<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RealEstatePost;
use App\Models\State;
use App\Models\City;

class Edit extends Component
{
    use WithFileUploads;

    public $realEstatePost;
    public $title, $description, $price, $bedrooms, $bathrooms, $sqft, $acre_lot, $address, $state, $city, $property_type, $listing_type, $garage, $year_built;
    public $exterior_image, $kitchen_image, $bathroom_image;
    public $states;
    public $cities;

    public function mount($id)
    {
        $this->realEstatePost = RealEstatePost::findOrFail($id);
        $this->fill($this->realEstatePost->toArray());
        $this->states = State::where('country_id', auth()->user()->details->country_id)->get();
        $this->cities = City::where('state_id', $this->state)->get(); 

        $this->state = $this->realEstatePost->state;
        $this->city = $this->realEstatePost->city;
    }

    public function updatedState()
    {
        $this->cities = City::where('state_id', $this->state)->get();
        $this->city = null; 
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'sqft' => 'nullable|numeric',
            'acre_lot' => 'required|numeric',
            'address' => 'required|string',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'property_type' => 'required|string',
            'listing_type' => 'required|in:rent,sale',
            'garage' => 'nullable|string',
            'year_built' => 'nullable|numeric',
            'exterior_image' => 'nullable|image|max:1024',
            'kitchen_image' => 'nullable|image|max:1024',
            'bathroom_image' => 'nullable|image|max:1024',
        ]);

        // Handle file uploads
        if ($this->exterior_image) {
            $this->realEstatePost->exterior_image_url = $this->exterior_image->store('uploads', 'public');
        }
        if ($this->kitchen_image) {
            $this->realEstatePost->kitchen_image_url = $this->kitchen_image->store('uploads', 'public');
        }
        if ($this->bathroom_image) {
            $this->realEstatePost->bathroom_image_url = $this->bathroom_image->store('uploads', 'public');
        }

        // Save the changes
        $this->realEstatePost->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'sqft' => $this->sqft,
            'acre_lot' => $this->acre_lot,
            'address' => $this->address,
            'state_id' => $this->state,
            'city_id' => $this->city,
            'property_type' => $this->property_type,
            'listing_type' => $this->listing_type,
            'garage' => $this->garage,
            'year_built' => $this->year_built,
        ]);

        session()->flash('status', 'Real estate post updated successfully.');
        return redirect()->route('real-estate.index');
    }

    public function render()
    {
        return view('livewire.real-estate.edit')->extends('frontend.layouts.master');
    }
}
