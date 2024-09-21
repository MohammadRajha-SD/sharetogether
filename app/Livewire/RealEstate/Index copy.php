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

    /* Keywords */
    public $keywords = [];

    public $story = '';

    public $daysOn = null;
    public $garage = null;
    public $min_home_age = null;
    public $max_home_age = null;

    // parking
    public $carport = null;
    public $rv_boat_parking = null;

    // healting && cooling 
    public $central_air = null;
    public $central_heat = null;
    public $forced_air = null;

    // square feet
    public $min_sqft = null;
    public $max_sqft = null;

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

    public function RealEstateKeywordsChanged(): void {}


    public function ChangedPropertyType($property_type): void
    {
        $this->property_type = $property_type;
        $this->resetPage();
    }

    public function RealStateSearch($search)
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
        $this->garage = $garage;
        $this->resetPage();
    }

    public function ChangedParking(array $data): void
    {
        $this->carport = $data['carport'] === false ? null : $data['carport'];
        $this->rv_boat_parking = $data['rv_boat_parking'] === false ? null : $data['rv_boat_parking'];

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
            $this->lot_views[$key] = $value === false ? null : $value;
        }

        $this->resetPage();
    }

    public function ChangedSquareFeet(array $data): void {
        $this->min_sqft = $data[0];
        $this->max_sqft = $data[1];

        $this->resetPage();
    }

    public function render()
    {
        $query = RealEstatePost::query();
        $query->where('visibility', 1);

        // Apply filters
        // if ($this->property_type) {
        //     $query->where('property_type', $this->property_type);
        // }

        // if ($this->min !== null) {
        //     $query->where('price', '>=', $this->min);
        // }

        // if ($this->max !== null) {
        //     $query->where('price', '<=', $this->max);
        // }

        // if ($this->min_bed !== null && $this->min_bed > 0) {
        //     $query->where('bedrooms', '>=', $this->min_bed);
        // }

        // if ($this->max_bed !== null && $this->max_bed > 0) {
        //     $query->where('bedrooms', '<=', $this->max_bed);
        // }

        // if ($this->min_bath !== null && $this->min_bath > 0) {
        //     $query->where('bathrooms', '>=', $this->min_bath);
        // }

        // if ($this->max_bath !== null && $this->max_bath > 0) {
        //     $query->where('bathrooms', '<=', $this->max_bath);
        // }

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

        // Keywords
        if (!empty($this->keywords)) {
            $query->where(function ($q) {
                foreach ($this->keywords as $keyword) {
                    $q->orWhere('description', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('title', 'LIKE', '%' . $keyword . '%');
                }
            });
        }

        // story
        if ($this->story !== '') {
            $query->where('story', $this->story);
        }

        // daysOn
        if ($this->daysOn !== null) {
            if ($this->daysOn == 1) {
                $query->where('updated_at', '>=', Carbon::now()->subDay());
            } else {
                $query->where('updated_at', '>=', Carbon::now()->subDays($this->daysOn));
            }
        }

        // home age min
        if ($this->min_home_age !== null) {
            $query->where('year_built', '>=', $this->min_home_age);
        }
        // home age max
        if ($this->max_home_age !== null) {
            $query->where('year_built', '<=', $this->max_home_age);
        }

        // garage
        if ($this->garage !== null) {
            // Convert to numeric and check if it's greater than or equal to the value
            $garageValue = (int)$this->garage; // Convert to integer

            if (is_numeric($garageValue) && $garageValue >= 0) { // Adjust the lower bound as needed
                $query->where('garage', '>=', $garageValue);
            }
        }

        if ($this->rv_boat_parking !== null) {
            $query->where('has_rv_boat_parking', $this->rv_boat_parking);
        }

        if ($this->carport !==  null) {
            $query->where('has_carport', $this->carport);
        }

        if ($this->central_air !==  null) {
            $query->where('has_central_air', $this->central_air);
        }

        if ($this->central_heat !==  null) {
            $query->where('has_central_heat', $this->central_heat);
        }

        if ($this->forced_air !==  null) {
            $query->where('has_forced_air', $this->forced_air);
        }

        // Filter based on lot_views
        if (!empty($this->lot_views)) {
            $query->where(function ($q) {
                foreach ($this->lot_views as $key => $value) {
                    if ($value !== null) {
                        $column_name = 'has_' . $key;
                        $q->where($column_name, $value);
                    }
                }
            });
        }


        // square feet min
        if ($this->min_sqft !== null) {
            $query->where('sqft', '>=', $this->min_sqft);
        }

        // square feet max
        if ($this->max_sqft !== null) {
            $query->where('sqft', '<=', $this->max_sqft);
        }

        $real_estate_posts = $query->paginate($this->limit);

        return view('livewire.real-estate.index', [
            'real_estate_posts' => $real_estate_posts,
        ]);
    }
}
