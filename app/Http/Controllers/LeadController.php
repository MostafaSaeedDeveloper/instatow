<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Quote;
use App\Mail\newQuote;
use App\Models\CarMake;
use App\Models\CarYear;
use App\Models\CarModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::orderBy('id', 'DESC')->get();
        return view('admin.leads.index', compact('leads'));
    }

    public function getLeads(Request $request)
    {
        $columns = ['serial', 'year', 'make', 'model', 'from_city', 'to_city', 'ship_via', 'specific_date', 'customer_id'];

        $query = Lead::with('customer')->select('*');

        if ($request->has('customer') && !empty($request->customer)) {
            $query->where('customer_id', $request->customer);
        }

        // Searching
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('serial', 'like', "%{$searchValue}%")
                  ->orWhere('year', 'like', "%{$searchValue}%")
                  ->orWhere('make', 'like', "%{$searchValue}%")
                  ->orWhere('model', 'like', "%{$searchValue}%")
                  ->orWhere('from_city', 'like', "%{$searchValue}%")
                  ->orWhere('to_city', 'like', "%{$searchValue}%");
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
        $leads = $query->skip($request->start)->take($request->length)->get();

        $data = $leads->map(function ($lead) {
            return [
                'id'=>"<a href='". route('leads.show', $lead->id) ."'>{$lead->serial}</a>",
                'customer' => "<a href=" . route('customers.show', $lead->customer->id) . ">{$lead->customer->first_name} {$lead->customer->last_name}</a>",
                'vehicle' =>  $lead->vehicles->map(function ($vehicle) {
                    return "{$vehicle->year} {$vehicle->make} {$vehicle->model}";
                })->implode('<hr>'),
                'type'=>$lead->vehicles->map(function ($vehicle) {
                    return "{$vehicle->type}";
                })->implode('<hr>'),
                'orig'=>"{$lead->from_zip} : {$lead->from_city} {$lead->from_state}",
                'dest'=>"{$lead->to_zip} : {$lead->to_city} {$lead->to_state}",
                'estship' => view('admin.leads.estship', ['lead' => $lead])->render(),
                'quote' => view('admin.leads.quote', ['lead' => $lead])->render(),
                'actions' => view('admin.leads.actions', ['lead' => $lead])->render(),
            ];
        });


        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $states = DB::table('states')->select('name', 'country_code', 'iso2')->where('country_code', 'US')->get();
        return view('admin.leads.create', compact('customers', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->customer_id == 'new') {
            $customer = Customer::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->email,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'phone2'=>$request->phone2,
                'cellphone'=>$request->cellphone,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip'=>$request->zip,
                'country'=>$request->country,
                'adderss_1'=>$request->address_1,
                'adderss_2'=>$request->address_2,
                'password'=>Hash::make(rand(1,9))
            ]);
            $customer_id = $customer->id;
        } else {
            $customer_id = $request->customer_id;
        }

        $lead = Lead::create([
            'serial' => rand(100000000, 999999999),
            'from_city' => $request->from_city,
            'from_state' => $request->from_state,
            'from_zip' => $request->from_zip,
            'from_country' => $request->from_country,
            'to_city' => $request->to_city,
            'to_state' => $request->to_state,
            'to_zip' => $request->to_zip,
            'to_country' => $request->to_country,
            'picked_up' => 'Specific Date',
            'notes' => $request->notes,
            'run' => $request->run,
            'ship_via' => $request->ship_via,
            'specific_date' => $request->ship_date,
            'customer_id' => $customer_id,
        ]);

        foreach($request->vehicles as $vehicle) {
            $lead->vehicles()->create([
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'type' => $vehicle['type'],
            ]);
        }


        return redirect()->route('leads.index')->with('success', 'Lead Succesfully Added !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $customers = Customer::all();
        $states = DB::table('states')->select('name', 'country_code', 'iso2')->where('country_code', 'US')->get();
       return view('admin.leads.edit', compact('lead', 'customers', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        if($request->customer_id == 'new') {
            $customer = Customer::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->email,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'phone2'=>$request->phone2,
                'cellphone'=>$request->cellphone,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip'=>$request->zip,
                'country'=>$request->country,
                'adderss_1'=>$request->address_1,
                'adderss_2'=>$request->address_2,
                'password'=>Hash::make(rand(1,9))
            ]);
            $customer_id = $customer->id;
        } else {
            $customer_id = $request->customer_id;
            $customer = Customer::find($customer_id);
            $customer->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'phone2'=>$request->phone2,
                'cellphone'=>$request->cellphone,
                'address_1'=>$request->address_1,
                'address_2'=>$request->address_2,
                'zip' => $request->zip,
                'state'=> $request->state,
                'city' => $request->city,
                'country' =>'United States',
            ]);
        }

       $lead->update([
        'from_city' => $request->from_city,
        'from_state' => $request->from_state,
        'from_zip' => $request->from_zip,
        'from_country' => $request->from_country,
        'to_city' => $request->to_city,
        'to_state' => $request->to_state,
        'to_zip' => $request->to_zip,
        'to_country' => $request->to_country,
        'picked_up' => 'Specific Date',
        'notes' => $request->notes,
        'run' => $request->run,
        'ship_via' => $request->ship_via,
        'specific_date' => $request->ship_date,
        'customer_id' => $customer_id,
       ]);

       $lead->vehicles()->delete();

       foreach($request->vehicles as $vehicle) {
            $lead->vehicles()->create([
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'type' => $vehicle['type'],
            ]);
        }


       return back()->with('success', 'Lead is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
       $lead->vehicles()->delete();
       $lead->delete();
       return back()->with('success', 'Lead Deleted Succesfully !');
    }

    public function place_order(Request $request) {

        $request->validate([
            'username'=>'unique:customers',
            'email'=>'unique:customers'
        ]);

        function parseLocation($input) {
            $parts = explode(':', $input);

            if (count($parts) !== 2) {
                return [null, null, null]; // Return null if format is incorrect
            }

            $zip = trim($parts[0]); // Get ZIP code
            $cityState = explode(',', trim($parts[1]));

            if (count($cityState) !== 2) {
                return [null, null, null]; // Return null if format is incorrect
            }

            $city = trim($cityState[0]); // City name
            $state = trim($cityState[1]); // State abbreviation

            return [$zip, $city, $state];
        }

        $origin = trim($request->origin);
        $destination = trim($request->destination);


        // Parse both origin and destination
        [$originZip, $originCity, $originState] = parseLocation($origin);
        [$destinationZip, $destinationCity, $destinationState] = parseLocation($destination);


        if(!auth('customer')->check()) {
            $customer = Customer::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->username,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'zip' => $originZip,
                'state'=> $originState,
                'city' => $originCity,
                'country' =>'United States',
                'password'=>Hash::make($request->password)
            ]);
            $customer_id = $customer->id;
        } else {
            $customer_id = $request->customer_id;
            $customer = Customer::find($customer_id);
        }

        // $year = CarYear::find($request->year)->year;
        // $make = CarMake::find($request->make)->make;
        // $model = CarModel::find($request->model)->model;

        $lead = Lead::create([
            'serial' => rand(100000000, 999999999),
            'from_city' => $originCity,
            'from_state' => $originState,
            'from_zip' => $originZip,
            'from_country' => 'United States',
            'to_city' => $destinationCity,
            'to_state'=> $destinationState,
            'to_zip' => $destinationZip,
            'to_country' =>'United States',
            'picked_up' => 'Specific Date',
            'notes' => $request->notes,
            'run' => $request->run,
            'ship_via' => 'open',
            'specific_date' => $request->ship_date,
            'customer_id' => $customer_id,
        ]);

        foreach($request->vehicles as $vehicle) {

        $year = CarYear::find($vehicle['year'])->year;
        $make = CarMake::find($vehicle['make']);
        $model = CarModel::find($vehicle['model']);

        if($make) {
            $make = $make->make;
        } else {
            $make = $vehicle['make'];
        }

        if($model) {
            $model = $model->model;
        } else {
            $model = $vehicle['model'];
        }

            $lead->vehicles()->create([
                'year' => $year,
                'make' => $make,
                'model' => $model,
                'type'=>$request->type
            ]);
        }

        // foreach($request->vehicles as $vehicle) {
        //     $lead->vehicles()->create([
        //         'year' => $vehicle['year'],
        //         'make' => $vehicle['make'],
        //         'model' => $vehicle['model'],
        //         'type' => $vehicle['type'],
        //     ]);
        // }



        auth('customer')->login($customer);
        return redirect()->route('thank-you');
    }


    public function convert_to_quote(Request $request) {
        $lead = Lead::find($request->lead_id);

        $quote = Quote::create([
            'serial' => $lead->serial,
            'from_city' => $lead->from_city,
            'from_state' => $lead->from_state,
            'from_zip' => $lead->from_zip,
            'from_country' => $lead->from_country,
            'to_city' => $lead->to_city,
            'to_state' => $lead->to_state,
            'to_zip' => $lead->to_zip,
            'to_country' => $lead->to_country,
            'picked_up' => $lead->picked_up,
            'notes' => $lead->notes,
            'run' => $lead->run, // Default value
            'ship_via' => $lead->ship_via, // Default value
            'specific_date' => $lead->ship_date,
            'tariff'=>$request->tariff ?? $request->price,
            'customer_id' => $lead->customer_id,
            'agent_id'=>auth()->user()->id
        ]);

        // $total = 0;
        foreach($lead->vehicles as $vehicle) {
            $quote->vehicles()->create([
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'type' => $vehicle['type'],
                'tariff'=>$vehicle['tariff']
            ]);
            // $total += $vehicle['tariff'];
        }

        // $quote->update([
        //     'tariff'=>$total
        // ]);

            // Send email
    if ($quote->customer && $quote->customer->email) {
        Mail::to($quote->customer->email)->send(new newQuote($quote));
    }

        $lead->delete();

        return redirect()->route('quotes.index')->with('success', 'Lead Converted to Quote successfully !');
    }


}
