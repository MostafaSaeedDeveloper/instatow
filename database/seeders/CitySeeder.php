<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = public_path('api/USCities.json');
        $json = json_decode(File::get($path), true);

        foreach ($json as $city) {
            City::create([
                'zip_code' => $city['zip_code'],
                'city' => $city['city'],
                'state' => $city['state'],
                'county' => $city['county'] ?? null,
                'latitude' => $city['latitude'],
                'longitude' => $city['longitude'],
            ]);
        }
    }
}
