<?php

namespace App\Livewire\Exchanges;

use Livewire\Component;
use App\Models\Store;

class Stores extends Component
{

    public function render()
    {
        $stores = Store::all();
        return view('livewire.exchanges.stores', compact('stores'));
    }
}
