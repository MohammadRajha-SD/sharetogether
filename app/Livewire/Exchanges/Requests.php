<?php

namespace App\Livewire\Exchanges;

use App\Models\Exchange;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Requests extends Component
{
    public $user_id;
    public $requested_products;

    public $show_product_id = null;

    public function mount()
    {
        // user_id 2 
        // offered id 2 -> t-shirt
        // requested id 1 -> laptop

        $this->user_id = Auth::id();
        // dd(auth()->user()->products()->pluck('id'));
        // 
        $this->requested_products =  Exchange::whereIn('product_id_requested', auth()->user()->products()->pluck('id'))
            ->with('productOffered', 'user')
            ->get();
    }

    public function ShowProduct($id)
    {
        $this->show_product_id = $id;
    }
    public function render()
    {
        return view('livewire.exchanges.requests');
    }
}
