<?php

namespace App\Livewire\Exchanges;

use Livewire\Component;

class StoreHeader extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = ['Pizza', 'Indian', 'Chinese', 'Vegan'];
    }

    public function render()
    {
        return view('livewire.exchanges.store-header');
    }
}
