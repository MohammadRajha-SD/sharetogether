<?php

namespace App\Livewire\RealEstate;

use App\Models\RealEstatePost;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /* Filter variables */
    public $min = null;
    public $max = null;

    /* Rooms */
    public $min_bed = null;
    public $max_bed = null;
    public $min_bath = null;
    public $max_bath = null;

    /* Search */
    public $search = null;

    /* Property */
    public $property_type = null;

    public $limit = 6;

    protected $listeners = ['ChangedPropertyType', 'ChangedPrice', 'ChangedRooms', 'RealStateSearch'];

    public function ChangedPropertyType($property_type): void
    {
        $this->property_type = $property_type;
        $this->resetPage();
    }

    public function RealStateSearch($search)
    {
        $this->search = $search;
    }

    public function ChangedPrice(array $data): void
    {
        $this->min = $data['min'] ?? null;
        $this->max = $data['max'] ?? null;

        $this->resetPage();
    }

    public function ChangedRooms(array $data): void
    {
        $this->min_bed = $data['min_bed'] ?? null;
        $this->max_bed = $data['max_bed'] ?? null;
        $this->min_bath = $data['min_bath'] ?? null;
        $this->max_bath = $data['max_bath'] ?? null;

        $this->resetPage();
    }

    public function render()
    {
        $query = RealEstatePost::query();

        // Apply filters
        if ($this->property_type) {
            $query->where('property_type', $this->property_type);
        }

        if ($this->min !== null) {
            $query->where('price', '>=', $this->min);
        }

        if ($this->max !== null) {
            $query->where('price', '<=', $this->max);
        }

        if ($this->min_bed !== null && $this->min_bed > 0) {
            $query->where('bedrooms', '>=', $this->min_bed);
        }

        if ($this->max_bed !== null && $this->max_bed > 0) {
            $query->where('bedrooms', '<=', $this->max_bed);
        }

        if ($this->min_bath !== null && $this->min_bath > 0) {
            $query->where('bathrooms', '>=', $this->min_bath);
        }

        if ($this->max_bath !== null && $this->max_bath > 0) {
            $query->where('bathrooms', '<=', $this->max_bath);
        }
        if ($this->search !== null) {
            $searchTerms = explode(',', $this->search);

            $city = isset($searchTerms[0]) ? trim($searchTerms[0]) : null;
            $state = isset($searchTerms[1]) ? trim($searchTerms[1]) : null;

            if ($city) {
                $query->where('city', 'like', '%' . $city . '%');
            }

            if ($state) {
                $query->where('state', 'like', '%' . $state . '%');
            }
        }

        $real_estate_posts = $query->paginate($this->limit);

        return view('livewire.real-estate.index', [
            'real_estate_posts' => $real_estate_posts,
        ]);
    }
}
