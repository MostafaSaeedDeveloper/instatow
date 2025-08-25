<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'DESC')->get();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function getvehicles(Request $request)
    {
        $columns = ['year', 'make', 'model'];

        $query = Vehicle::select('*');

        if ($request->has('customer') && !empty($request->customer)) {
            $query->where('customer_id', $request->customer);
        }

        // Searching
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->orWhere('year', 'like', "%{$searchValue}%")
                  ->orWhere('make', 'like', "%{$searchValue}%")
                  ->orWhere('model', 'like', "%{$searchValue}%");

                  $q->orWhereHasMorph('vehicle', [
                    \App\Models\Lead::class,
                    \App\Models\Order::class,
                    \App\Models\Quote::class,
                ], function ($query) use ($searchValue) {
                    $query->where('serial', 'like', "%{$searchValue}%");
                });
            });
        }

        // Ordering
        if ($request->has('order')) {
            $columnIndex = $request->order[0]['column'];
            $columnName = $columns[$columnIndex];
            $columnSortOrder = $request->order[0]['dir'];
            $query->orderBy($columnName, $columnSortOrder);
        } else {
            $query->orderBy('id', 'desc');
        }

        // Pagination
        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $vehicles = $query->skip($request->start)->take($request->length)->get();

        $data = $vehicles->map(function ($vehicle) {
            return [
                'id'=>"{$vehicle->id}",
                'year'=>$vehicle->year,
                'make'=>$vehicle->make,
                'model'=>$vehicle->model,
                'entry_serial' => optional($vehicle->vehicle)->serial,
                'actions' => view('admin.vehicles.actions', ['vehicle' => $vehicle])->render(),
            ];
        });


        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }
}
