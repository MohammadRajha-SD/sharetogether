<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function getStates($country_id)
    {
        $country = collect(config('location')['countries'])->firstWhere('id', $country_id);
        $states = $country['states'] ?? [];

        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $states = collect(config('location')['countries'])->pluck('states')->flatten(1);
        $state = $states->firstWhere('id', $state_id);
        $cities = $state['cities'] ?? [];

        return response()->json($cities);
    }
}
