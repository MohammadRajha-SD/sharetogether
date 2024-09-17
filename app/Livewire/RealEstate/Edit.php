<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RealEstatePost;
use App\Models\State;
use App\Models\City;
use App\Traits\ImageUploadTrait;

class Edit extends Component
{
    use WithFileUploads;
    use ImageUploadTrait;

    public $realEstatePost;
    public $title, $description, $price, $bedrooms, $bathrooms, $sqft, $acre_lot, $address, $state, $city, $property_type, $listing_type, $garage, $year_built;
    public $exterior_image, $kitchen_image, $bathroom_image;
    public $states;
    public $cities;
    public $listing_types;
    public $property_types;

    public $images = [];
    public $current_images;

    public function mount($id)
    {
        $this->realEstatePost = RealEstatePost::findOrFail($id);
        if ($this->realEstatePost->user_id === auth()->user()->id) {
            $this->fill($this->realEstatePost->toArray());
            $this->states = State::where('country_id', auth()->user()->details->country_id)->get();
            $this->cities = City::where('state_id', $this->state)->get();

            $this->state = $this->realEstatePost->state;
            $this->city = $this->realEstatePost->city;

            $this->listing_types = ['rent', 'sale'];
            $this->property_types = ['house', 'condo', 'townhome', 'multi family', 'mobile', 'farm', 'land'];

            $this->current_images = $this->realEstatePost->images ?? [];
            
        } elseif ($this->realEstatePost->user_id != auth()->user()->id && $this->realEstatePost->visibility === 0) {
            session()->flash('error', 'Sorry, this real estate post is private.');
            return redirect()->route('real-estate.index');
        } else {
            session()->flash('error', 'Sorry, you do not have access to edit this real estate post.');
            return redirect()->route('real-estate.show', $this->realEstatePost->id);
        }
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

        // Handle file uploads
        if ($this->exterior_image) {
            $imagePath = $this->uploadImage2($this->exterior_image, '');
            $this->deleteImage($this->realEstatePost->exterior_image_url);
            $this->realEstatePost->update([
                'exterior_image_url' => 'uploads/' . $imagePath,
            ]);
        }
        if ($this->kitchen_image) {
            $imagePath = $this->uploadImage2($this->kitchen_image, '');
            $this->deleteImage($this->realEstatePost->kitchen_image_url);
            $this->realEstatePost->update([
                'kitchen_image_url' => 'uploads/' . $imagePath,
            ]);
        }
        if ($this->bathroom_image) {
            $imagePath = $this->uploadImage2($this->bathroom_image, '');
            $this->deleteImage($this->realEstatePost->bathroom_image_url);
            $this->realEstatePost->update([
                'bathroom_image_url' => 'uploads/' . $imagePath,
            ]);
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
            'state' => $this->state,
            'city' => $this->city,
            'property_type' => $this->property_type,
            'listing_type' => $this->listing_type,
            'garage' => $this->garage,
            'year_built' => $this->year_built,
        ]);


        if ($this->images) {
            foreach ($this->realEstatePost->images as $image) {
                $this->deleteImage($image->path);
                $image->delete();
            }

            foreach ($this->images as $image) {
                $imagePath = $this->uploadImage2($image, '');
                $this->realEstatePost->images()->create([
                    'path' => 'uploads' . $imagePath,
                ]);
            }
        }

        session()->flash('status', 'Real estate post updated successfully.');

        return redirect()->route('real-estate.show', $this->realEstatePost->id);
    }

    public function render()
    {
        return view('livewire.real-estate.edit')->extends('frontend.layouts.master');
    }
}
