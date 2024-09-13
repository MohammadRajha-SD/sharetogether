<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class SubCategory extends Component
{
    public $category;
    public $listeners = ['loadSubcategories'];

    public function mount(){
        $this->category = collect();
    }

    public function loadSubcategories($categoryId)
    {
        if($categoryId !== 'mouseleft' && $categoryId !== ""){
            $this->category = config('categories')['categories'][$categoryId];
        }else{
            $this->category = collect();
        }
    }

    public function render()
    {
        return view('livewire.categories.sub-category',[
            'category' => $this->category,
        ]);
    }
}
