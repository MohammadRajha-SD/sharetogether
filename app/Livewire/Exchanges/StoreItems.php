<?php

namespace App\Livewire\Exchanges;

use App\Models\Store;
use Exception;
use Livewire\Component;

class StoreItems extends Component
{
    public $store;

    public function mount($id)
    {
        $this->store = collect();

        if (!is_numeric($id) || (int)$id <= 0) {
            session()->flash('error', 'Invalid Store ID provided.');
        }

        try {
            $id = (int) $id;

            $this->store = Store::findOrFail($id);
        } catch (Exception $err) {
            session()->flash('error', 'No items found for this store.');
        }
    }

    public function render()
    {
        return view('livewire.exchanges.store-items', ['store' => $this->store]);
    }
}
