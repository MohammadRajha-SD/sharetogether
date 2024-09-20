<?php

namespace App\Livewire\RealEstate;

use App\Models\RealEstatePost;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;

    public $limit = 6;
    protected $paginationTheme = 'bootstrap';

    /* Filters */
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

    /* Keywords */
    public $keywords = [];

    public $story = '';

    public $daysOn = null;
    public $garage = null;
    public $min_home_age = null;
    public $max_home_age = null;

    // Parking
    public $carport = null;
    public $rv_boat_parking = null;

    // Heating & Cooling
    public $central_air = null;
    public $central_heat = null;
    public $forced_air = null;

    // Square Feet
    public $min_sqft = null;
    public $max_sqft = null;

    // Lot views
    public $lot_views = [
        'waterfront_view' => null,
        'river_view' => null,
        'hill_mtn_view' => null,
        'cul_de_sac' => null,
        'ocean_view' => null,
        'corner_lot' => null,
        'lake_view' => null,
        'golf_course_lot' => null,
        'golf_course_vi' => null,
    ];

    protected $listeners = [
        'ChangedPropertyType',
        'ChangedPrice',
        'ChangedRooms',
        'RealStateSearch',
        'ChangedKeywords',
        'ChangedStory',
        'ChangedDaysOn',
        'ChangedHomeAge',
        'ChangedGarage',
        'ChangedParking',
        'ChangedHealthingCooling',
        'ChangedLotViews',
        'ChangedSquareFeet',
    ];

    /* Listeners */
    public function ChangedPropertyType($property_type): void
    {
        $this->property_type = $property_type;
        $this->resetPage();
    }

    public function RealStateSearch($search): void
    {
        $this->search = $search;
        $this->resetPage();
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

    public function ChangedStory($story): void
    {
        $this->story = $story;
        $this->resetPage();
    }

    public function ChangedDaysOn($daysOn): void
    {
        $this->daysOn = $daysOn;
        $this->resetPage();
    }

    public function ChangedHomeAge(array $data): void
    {
        $this->min_home_age = $data[0] ?? null;
        $this->max_home_age = $data[1] ?? null;
        $this->resetPage();
    }

    public function ChangedGarage($garage): void
    {
        $this->garage = is_numeric($garage) && $garage >= 0 ? $garage : null;
        $this->resetPage();
    }

    public function ChangedParking(array $data): void
    {
        $this->carport = $data['carport'] !== false ? $data['carport'] : null;
        $this->rv_boat_parking = $data['rv_boat_parking'] !== false ? $data['rv_boat_parking'] : null;
        $this->resetPage();
    }

    public function ChangedHealthingCooling(array $data): void
    {
        $this->central_air = $data['central_air'];
        $this->central_heat = $data['central_heat'];
        $this->forced_air = $data['forced_air'];
        $this->resetPage();
    }

    public function ChangedLotViews(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->lot_views[$key] = $value !== false ? $value : null;
        }
        $this->resetPage();
    }

    public function ChangedSquareFeet(array $data): void
    {
        $this->min_sqft = $data[0] ?? null;
        $this->max_sqft = $data[1] ?? null;
        $this->resetPage();
    }

    /* Query building */
    public function applyFilters($query)
    {
        // Property type
        $query->when($this->property_type, fn($q) => $q->where('property_type', $this->property_type));

        // Price range
        $query->when($this->min, fn($q) => $q->where('price', '>=', $this->min))
            ->when($this->max, fn($q) => $q->where('price', '<=', $this->max));

        // Bedrooms and bathrooms
        $query->when($this->min_bed, fn($q) => $q->where('bedrooms', '>=', $this->min_bed))
            ->when($this->max_bed, fn($q) => $q->where('bedrooms', '<=', $this->max_bed))
            ->when($this->min_bath, fn($q) => $q->where('bathrooms', '>=', $this->min_bath))
            ->when($this->max_bath, fn($q) => $q->where('bathrooms', '<=', $this->max_bath));

        // Search
        if ($this->search) {
            $searchTerms = explode(',', $this->search);
            $city = $searchTerms[0] ?? null;
            $state = $searchTerms[1] ?? null;
            $query->when($city, fn($q) => $q->where('city', 'like', "%$city%"))
                ->when($state, fn($q) => $q->where('state', 'like', "%$state%"));
        }

        // Keywords
        $query->when($this->keywords, fn($q) => $q->where(function ($subQuery) {
            foreach ($this->keywords as $keyword) {
                $subQuery->orWhere('description', 'LIKE', "%$keyword%")
                    ->orWhere('title', 'LIKE', "%$keyword%");
            }
        }));

        // Story, home age, garage, and square feet
        $query->when($this->story, fn($q) => $q->where('story', $this->story))
            ->when($this->daysOn, fn($q) => $q->where('updated_at', '>=', Carbon::now()->subDays($this->daysOn)))
            ->when($this->min_home_age, fn($q) => $q->where('year_built', '>=', $this->min_home_age))
            ->when($this->max_home_age, fn($q) => $q->where('year_built', '<=', $this->max_home_age))
            ->when($this->garage, fn($q) => $q->where('garage', '>=', (int)$this->garage))
            ->when($this->min_sqft, fn($q) => $q->where('sqft', '>=', $this->min_sqft))
            ->when($this->max_sqft, fn($q) => $q->where('sqft', '<=', $this->max_sqft));

        // Lot views, parking, heating & cooling
        foreach ($this->lot_views as $view => $value) {
            $query->when($value, fn($q) => $q->where("has_$view", $value));
        }

        $query->when($this->rv_boat_parking, fn($q) => $q->where('has_rv_boat_parking', $this->rv_boat_parking))
            ->when($this->carport, fn($q) => $q->where('has_carport', $this->carport))
            ->when($this->central_air, fn($q) => $q->where('has_central_air', $this->central_air))
            ->when($this->central_heat, fn($q) => $q->where('has_central_heat', $this->central_heat))
            ->when($this->forced_air, fn($q) => $q->where('has_forced_air', $this->forced_air));
    }

    public function render()
    {
        $query = RealEstatePost::query()->where('visibility', 1);

        // $this->applyFilters($query);
        if ($this->garage !== null) {
            $query->where('garage', '>=', (int)$this->garage);
        }

        $real_estate_posts = $query->paginate($this->limit);

        dd($real_estate_posts);
        return view('livewire.real-estate.index', compact('real_estate_posts'));
    }
}
