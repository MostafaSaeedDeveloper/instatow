<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use App\Models\CarMake;
use App\Models\CarYear;
use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();

        // Get the min and max year from the API response
        $minYear = 1995;
        $maxYear = 2025;

        // Generate an array of years between the min and max year
        $years = range($minYear, $maxYear);  // This generates an array of years

        // Store the years in the CarYear model if not already stored
        foreach($years as $year) {
            $carYear = CarYear::create([
                'year'=>$year
            ]);

            $response = $client->get("https://vpic.nhtsa.dot.gov/api/vehicles/GetMakesForManufacturerAndYear/mer?year={$carYear->year}&format=json");
            $makesData = json_decode($response->getBody()->getContents(), true);
            foreach($makesData['Results'] as $make) {
                $carMake = CarMake::create([
                    'make'=>$make['MakeName'],
                    'make_id'=>$make['MakeId'],
                    'car_year_id'=>$carYear->id
                ]);

                $response = $client->get("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeIdYear/makeId/{$carMake->make_id}/modelyear/{$year}?format=json");
                $modelsData = json_decode($response->getBody()->getContents(), true);
                foreach($modelsData['Results'] as $model) {
                    $carModel = CarModel::create([
                        'model'=>$model['Model_Name'],
                        'car_make_id'=>$carMake->id
                    ]);
                }

            }


        }

    }
}
