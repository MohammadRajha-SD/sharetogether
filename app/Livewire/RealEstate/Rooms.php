<?php

namespace App\Livewire\RealEstate;

use Livewire\Component;

class Rooms extends Component
{
    public $is_show = false;
    public $min_bed = null;
    public $max_bed = null;
    public $min_bath =null;
    public $max_bath =null;

    public $rooms = 'Rooms';

    public function toggleShow(){
        $this->is_show = !$this->is_show;
    }

    public function submit()
    {
        $this->is_show = false;
        $this->dispatch('ChangedRooms', [
            'min_bed' => (int)$this->min_bed,
            'max_bed' => (int)$this->max_bed,
            'min_bath' => (int)$this->min_bath,
            'max_bath' => (int)$this->max_bath,
        ]);


        $bed = null;
        if($this->min_bed > 0 && $this->max_bed > 0){
            $bed = $this->min_bed.'-'. $this->max_bed.' bed';
        }elseif($this->min_bed > 0 && !$this->max_bed){
            $bed = $this->min_bed.'+ bed';
        }elseif($this->max_bed > 0 && !$this->min_bed){
            $bed = 0 . '-' . $this->max_bed . ' bed';
        }

        $bath = null;

        if($this->min_bath > 0 && $this->max_bath > 0){
            $bath = $this->min_bath.'-'. $this->max_bath.' bath';
        }elseif($this->min_bath > 0 && !$this->max_bath){
            $bath = $this->min_bath.'+ bath';
        }elseif($this->max_bath > 0 && !$this->min_bath){
            $bath = 0 . '-' . $this->max_bath . ' bath';
        }


        if ($bed !== null && $bath !== null) {
            $this->rooms = $bed . ' / ' . $bath;
        } elseif ($bed !== null) {
            $this->rooms = $bed;
        } elseif ($bath !== null) {
            $this->rooms = $bath;
        } else {
            $this->rooms = 'Rooms';
        }
    }

    public function render()
    {
        $start_beds = $this->min_bed > 0 ? $this->min_bed : 1;
        $start_baths = $this->min_bath > 0 ? $this->min_bath : 1;

        $max_beds = range($start_beds,5);
        $max_baths = range($start_baths,5);

        return view('livewire.real-estate.rooms', compact('max_beds', 'max_baths'));
    }
}
