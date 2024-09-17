<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RealEstatePost;
use App\Models\State;
use App\Models\City;
use App\Traits\ImageUploadTrait;

class Create extends Component
{
    use WithFileUploads;
    use ImageUploadTrait;
    public $current_images = []; 
    public $title, $description, $price, $bedrooms, $bathrooms, $sqft, $acre_lot, $address, $state, $city, $property_type, $listing_type, $garage, $year_built;
    public $exterior_image, $kitchen_image, $bathroom_image;
    public $states;
    public $cities;
    public $listing_types;
    public $property_types;

    public $realEstatePost;
    public $images = [];

    public function mount()
    {
        // Load states based on user's country
        $this->states = State::where('country_id', auth()->user()->details->country_id)->get();
        $this->cities = City::where('state_id', $this->state)->get();

        $this->listing_types = ['rent', 'sale'];
        $this->property_types = ['house', 'condo', 'townhome', 'multi family', 'mobile', 'farm', 'land'];
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
            'property_type' => 'required|in:house,condo,townhome,multi family,mobile,farm,land',
            'listing_type' => 'required|in:rent,sale',
            'garage' => 'nullable|numeric',
            'year_built' => 'nullable|numeric',
            'exterior_image' => 'nullable|image|max:1024',
            'kitchen_image' => 'nullable|image|max:1024',
            'bathroom_image' => 'nullable|image|max:1024',
        ]);

        // Create a new real estate post
        $this->realEstatePost = RealEstatePost::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'sqft' => $this->sqft,
            'acre_lot' => $this->acre_lot,
            'address' => $this->address,
            'state' => $this->state,
            'city' => $this->city,
            'property_type' => $this->property_type,
            'listing_type' => $this->listing_type,
            'garage' => $this->garage,
            'year_built' => $this->year_built,
        ]);

        // Handle image uploads
        if ($this->exterior_image) {
            $imagePath = $this->uploadImage2($this->exterior_image, 'real_estate');
            $this->realEstatePost->update(['exterior_image_url' => 'uploads/' . $imagePath]);
        }
        if ($this->kitchen_image) {
            $imagePath = $this->uploadImage2($this->kitchen_image, 'real_estate');
            $this->realEstatePost->update(['kitchen_image_url' => 'uploads/' . $imagePath]);
        }
        if ($this->bathroom_image) {
            $imagePath = $this->uploadImage2($this->bathroom_image, 'real_estate');
            $this->realEstatePost->update(['bathroom_image_url' => 'uploads/' . $imagePath]);
        }

        // Handle multiple image uploads
        if ($this->images) {
            foreach ($this->images as $image) {
                $imagePath = $this->uploadImage2($image, 'real_estate');
                $this->realEstatePost->images()->create(['path' => 'uploads/' . $imagePath]);
            }
        }

        // Flash success message and redirect
        session()->flash('status', 'Real estate post created successfully.');

        return redirect()->route('real-estate.show', $this->realEstatePost->id);
    }

    public function render()
    {
        return view('livewire.real-estate.create')->extends('frontend.layouts.master');
    }
}
