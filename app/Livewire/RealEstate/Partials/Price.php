<?php

namespace App\Livewire\RealEstate\Partials;

use Livewire\Component;

class Price extends Component
{
    public $is_show = false;
    public $min_price;
    public $max_price;
    public $is_valid = true;
    public $price = 0;

    public function validateMaxPrice()
    {
        if ($this->max_price !== null && $this->min_price >= $this->max_price) {
            $this->is_valid = false;
        } else {

            $this->is_valid = true;
        }
    }

    public function submit()
    {
        $this->validateMaxPrice();

        if ($this->is_valid) {
            $this->is_show = false;

            $this->dispatch('ChangedPrice', [
                'min' => $this->min_price,
                'max' => $this->max_price,
            ]);

            $min = formatPrice($this->min_price) ?? 0;
            $max = formatPrice($this->max_price) ?? null;

            if ($min > 0 && $max !== null) {
                $this->price = $min . ' - ' . $max;
            } elseif ($min > 0 && $max === null) {
                $this->price = $min;
            } else {
                $this->price = $max;
            }

        } else {
            $this->is_show = true;
        }
    }

    public function toggleShow()
    {
        $this->is_show = !$this->is_show;
    }

    public function render()
    {
        return view('livewire.real-estate.partials.price');
    }
}
