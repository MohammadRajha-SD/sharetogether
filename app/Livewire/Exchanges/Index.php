<?php

namespace App\Livewire\Exchanges;

use App\Models\Exchange;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class Index extends Component
{
    public $user_id = null;
    public $stores;
    public $products;
    public $product_id_offered = null;
    public $product_id_requested = null;
    public $visible_product_id = null;

    public function mount()
    {
        $this->user_id = auth()->id();
        $this->stores = Store::all() ?? collect();

        $this->products = Product::where('user_id', '!=', $this->user_id)
            ->whereDoesntHave('offeredExchanges', function ($query) {
                $query->where('status', 'accepted');
            })->whereDoesntHave('requestedExchanges', function ($query) {
                $query->where('status', 'accepted');
            })->get() ?? collect();
    }

    public function setProductIdRequested($productId)
    {
        $this->product_id_requested = $productId;
        if ($productId == $this->visible_product_id) {
            $this->visible_product_id = null;
        } else {
            $this->visible_product_id = $productId;
        }
    }

    public function submit()
    {
        
        $this->validate([
            'product_id_offered' => 'required|exists:products,id',
            'product_id_requested' => 'required|exists:products,id',
        ]);

        // Check if the exchange already exists
        $existingExchange = Exchange::where('product_id_offered', (int)$this->product_id_offered)
            ->where('product_id_requested', (int)$this->product_id_requested)
            ->first(); // Use first() instead of get()

        if ($existingExchange) {
            session()->flash('error', 'You have already requested this exchange.');
            return redirect()->route('exchange.index');
        } else {
            // Create the new exchange request
            Exchange::create([
                'user_id' => $this->user_id, // Ensure you have the correct user ID
                'product_id_offered' => (int)$this->product_id_offered,
                'product_id_requested' => (int)$this->product_id_requested,
                'status' => 'pending',
            ]);

            session()->flash('status', 'Exchange request sent!');
            return redirect()->route('exchange.index');
        }
    }


    public function render()
    {

        return view('livewire.exchanges.index');
    }
}
