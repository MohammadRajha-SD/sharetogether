<?php

namespace App\Livewire\RealEstate\Partials;

use Livewire\Component;

class More extends Component
{
    public $lot_views = [
        'waterfront_view' => false,
        'river_view' => false,
        'hill_mtn_view' => false,
        'cul_de_sac' => false,
        'ocean_view' => false,
        'corner_lot' => false,
        'lake_view' => false,
        'golf_course_lot' => false,
        'golf_course_vi' => false,
    ];

    public $is_show_more = false;

    public $keywords = [];
    public $keyword = '';
    public $story = '';
    public $daysOn = null;
    public $garage = 0;

    // home age 
    public $min_home_age = null;
    public $max_home_age = null;
    public $is_valid_home_age = true;
    public $home_age = 0;
    
    // square feet
    public $min_sqft = null;
    public $max_sqft = null;
    public $is_valid_sqft = true;

    public $carport = false;
    public $rv_boat_parking = false;

    public $central_air = false;
    public $central_heat = false;
    public $forced_air = false;

    public function toggleShowMore()
    {
        $this->is_show_more = !$this->is_show_more;
    }

    public function keywordInputUpdated()
    {
        $this->keywordChanged($this->keyword);
        $this->keyword = '';
    }

    public function removeKeyword($keyword)
    {
        if (($key = array_search($keyword, $this->keywords)) !== false) {
            unset($this->keywords[$key]);
            $this->keywords = array_values($this->keywords);
        }
    }

    public function keywordChanged($keyword)
    {
        if ($keyword !== '') {
            if (!in_array($keyword, $this->keywords)) {
                $this->keywords[] = $keyword;
            } else {
                $index = array_search($keyword, $this->keywords);
                if ($index !== false) {
                    unset($this->keywords[$index]);
                    $this->keywords = array_values($this->keywords);
                }
            }
        }
    }

    public function storyChanged($story)
    {
        $this->story = $story;
    }

    public function daysOnChanged($daysOn){
        $this->daysOn = $daysOn;
    }

    // home age validate function
    public function validateHomeAge()
    {
        // Check if max is null, it's okay to filter by min
        if ($this->min_home_age != null && $this->max_home_age == null) {
            $this->is_valid_home_age = true;
            return;
        }
    
        // Check if min is null, it's okay to filter by max
        if ($this->min_home_age == null && $this->max_home_age != null) {
            $this->is_valid_home_age = true;
            return;
        }
    
        // Both min and max are set, validate if max is greater than min
        if ($this->min_home_age !== null && $this->max_home_age !== null) {
            $this->is_valid_home_age = $this->max_home_age > $this->min_home_age;
        }
    }

    public function validateSquareFeet()
    {
         if ($this->min_sqft != null && $this->max_sqft == null) {
            $this->is_valid_sqft = true;
            return;
        }
    
        if ($this->min_sqft == null && $this->max_sqft != null) {
            $this->is_valid_sqft = true;
            return;
        }
    
        if ($this->min_sqft !== null && $this->max_sqft !== null) {
            $this->is_valid_sqft = $this->max_sqft > $this->min_sqft;
        }
    }


    public function garageChanged($garage){
        $this->garage = $garage;
    }

    public function submit()
    {
        $this->is_show_more = false;
        // $this->validateHomeAge();
        // $this->validateSquareFeet();
        
        // $this->dispatch('ChangedKeywords', $this->keywords);
        // $this->dispatch('ChangedStory', $this->story);
        // $this->dispatch('ChangedDaysOn', $this->daysOn);
        // $this->dispatch('ChangedHomeAge', [$this->min_home_age, $this->max_home_age]);
        $this->dispatch('ChangedGarage', ['garage' => $this->garage]);
        // $this->dispatch('ChangedParking', [
            // 'carport' => $this->carport,
            // 'rv_boat_parking' => $this->rv_boat_parking,
        // ]);
        // $this->dispatch('ChangedHealthingCooling', [
            // 'central_air' => $this->central_air,
            // 'central_heat' => $this->central_heat,
            // 'forced_air' => $this->forced_air,
        // ]);
        
        // $this->dispatch('ChangedLotViews', $this->lot_views);
        // $this->dispatch('ChangedSquareFeet', [$this->min_sqft, $this->max_sqft]);
    }

    public function render()
    {
        return view('livewire.real-estate.partials.more');
    }
}
