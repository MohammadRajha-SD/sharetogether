<?php
namespace App\Services;

use PDO;
use Illuminate\Support\Facades\Http;

class LocationService
{
    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
         // Radius of the Earth in kilometers
        $earthRadius = 6371;

        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $latDiff = $lat2 - $lat1;
        $lonDiff = $lon2 - $lon1;

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
             cos($lat1) * cos($lat2) *
             sin($lonDiff / 2) * sin($lonDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance; // Distance in kilometers
    }

    public function getGeoLocation($latitude,  $longitude){
        $response = Http::withHeaders([
            'User-Agent' => '(mohammadrajha2@gmail.com)'
        ])->get('https://nominatim.openstreetmap.org/reverse', [
            'lat' => $latitude,
            'lon' => $longitude,
            'format' => 'json'
        ]);
    
        return response($response->body(), 200)
            ->header('Content-Type', 'application/json');
    }
}
