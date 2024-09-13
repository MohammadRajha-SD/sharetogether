<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;

class PropertyType extends Component
{
    public $selectedProperty = null;
    public $is_show = false;

    public $properties = ['House', 'Condo', 'Townhome', 'Multi Family', 'Mobile', 'Farm', 'Land'];

    public function selectProperty($value)
    {
        $this->selectedProperty = $value;
        $this->is_show = true;
    }

    public function submit()
    {
        $this->is_show = false;

        $this->dispatch('ChangedPropertyType', $this->selectedProperty);
    }

    public function render()
    {
        return view('livewire.real-estate.property-type');
    }
}
