<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function getAddress(Request $request) {
        $query = trim($request->input('keyword'));

        if (empty($query)) {
            return response()->json([]); // Return an empty array
        }

        $filteredCities = City::where('city', 'LIKE', "%{$query}%")
            ->orWhere('state', 'LIKE', "%{$query}%")
            ->orWhere('zip_code', 'LIKE', "%{$query}%")
            ->limit(10) // Limits results to prevent overload
            ->get();

        return response()->json($filteredCities);

    }

    public function getMakesByYear(Request $request)
    {
        // $year = CarYear::where('year', $request->year)->first();


        $makes = CarMake::where('car_year_id', $request->year)->get();
        // $client = new Client();

        // // Fetch car makes data for the selected year from the API
        // $response = $client->get("https://www.carqueryapi.com/api/0.3/?cmd=getMakes&year={$year}");
        // $makes = json_decode($response->getBody()->getContents(), true);

        return response()->json($makes);
    }

    public function getModelsByMake(Request $request)
    {
        // $makeId = $request->input('make');
        // $year = $request->input('year');
        // $client = new Client();

        // // Fetch models data for the selected make from the API
        // $response = $client->get("https://www.carqueryapi.com/api/0.3/?cmd=getModels&year={$year}&make={$makeId}");
        // $models = json_decode($response->getBody()->getContents(), true);

        $models = CarModel::where('car_make_id', $request->make)->get();

        return response()->json($models);
    }

}
