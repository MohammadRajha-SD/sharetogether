<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesOld extends Component
{
    public $categories;

    public $category = '';

    public function mount()
    {
        $this->categories = Category::where('parent_id', null)->get();
    }
    public function render()
    {
        return view('livewire.categories');
    }
}
