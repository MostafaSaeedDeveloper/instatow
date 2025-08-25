<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Quote;
use App\Mail\newQuote;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::orderBy('id', 'DESC')->get();
        return view('admin.quotes.index', compact('quotes'));
    }

    public function getQuotes(Request $request)
    {
        $columns = ['serial', 'year', 'make', 'model', 'from_city', 'to_city', 'ship_via', 'specific_date', 'customer_id'];

        $query = Quote::with('customer')->select('*');

        if ($request->has('customer') && !empty($request->customer)) {
            $query->where('customer_id', $request->customer);
        }

        // Searching
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('serial', 'like', "%{$searchValue}%")
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
        $quotes = $query->skip($request->start)->take($request->length)->get();

        $data = $quotes->map(function ($quote) {
            return [
                'id'=>"<a href='". route('quotes.edit', $quote->id) ."'>{$quote->serial}</a>",
                'customer' => "<a href=" . route('customers.show', $quote->customer->id) . ">{$quote->customer->first_name} {$quote->customer->last_name}</a>",
                // 'agent' => "<a href=" . route('users.show', $quote->agent->id) . ">{$quote->agent->name}</a>",
                'agent' => "{$quote->agent->name}",
                'vehicle' =>  $quote->vehicles->map(function ($vehicle) {
                    return "{$vehicle->year} {$vehicle->make} {$vehicle->model}";
                })->implode('<hr>'),
                'type'=>$quote->vehicles->map(function ($vehicle) {
                    return "{$vehicle->type}";
                })->implode('<hr>'),
                'orig'=>"{$quote->from_zip} : {$quote->from_city} {$quote->from_state}",
                'dest'=>"{$quote->to_zip} : {$quote->to_city} {$quote->to_state}",
                'estship' => view('admin.quotes.estship', ['quote' => $quote])->render(),
                'tariff' => "$$quote->tariff",
                'actions' => view('admin.quotes.actions', ['quote' => $quote])->render(),
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
        return view('admin.quotes.create', compact('customers', 'states'));
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

       $quote =  Quote::create([
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
            'tariff'=>0,
            'agent_id'=>auth()->user()->id
        ]);

        $total = 0;

        foreach($request->vehicles as $vehicle) {
            $quote->vehicles()->create([
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'type' => $vehicle['type'],
                'tariff'=>$vehicle['tariff']
            ]);
            $total += $vehicle['tariff'];
        }

        $quote->update([
            'tariff'=>$total
        ]);

        if ($quote->customer && $quote->customer->email) {
            Mail::to($quote->customer->email)->send(new newQuote($quote));
        }


        return redirect()->route('quotes.index')->with('success', 'Quote Succesfully Added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        $customers = Customer::all();
        $states = DB::table('states')->select('name', 'country_code', 'iso2')->where('country_code', 'US')->get();
       return view('admin.quotes.edit', compact('quote', 'customers', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
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

       $quote->update([
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

       $quote->vehicles()->delete();

       $total = 0;

       foreach($request->vehicles as $vehicle) {
           $quote->vehicles()->create([
               'year' => $vehicle['year'],
               'make' => $vehicle['make'],
               'model' => $vehicle['model'],
               'type' => $vehicle['type'],
               'tariff'=>$vehicle['tariff']
           ]);
           $total += $vehicle['tariff'];
       }

       $quote->update([
           'tariff'=>$total
       ]);



       return back()->with('success', 'Quote is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->vehicles()->delete();
        $quote->delete();
        return back()->with('success', 'Quote Deleted Succesfully !');
    }


   public function convert_to_order($id)
{
    $quote = Quote::findOrFail($id);

    // 1️⃣ Create local order
    $order = Order::create([
        'serial' => $quote->serial,
        'customer_id' => $quote->customer->id,
        'from_city' => $quote->from_city,
        'from_state' => $quote->from_state,
        'from_zip' => $quote->from_zip,
        'from_country' => $quote->from_country,
        'to_city' => $quote->to_city,
        'to_state' => $quote->to_state,
        'to_zip' => $quote->to_zip,
        'to_country' => $quote->to_country,
        'picked_up' => $quote->picked_up ?? 'Flexible',
        'run' => $quote->run ?? true,
        'ship_via' => $quote->ship_via ?? 'open',
        'notes_from_customer' => $quote->notes,
        'tariff' => $quote->tariff,
        'status' => 'Converted Order'
    ]);

    foreach ($quote->vehicles as $vehicle) {
        $order->vehicles()->create([
            'year' => $vehicle['year'],
            'make' => $vehicle['make'],
            'model' => $vehicle['model'],
            'type' => $vehicle['type'],
            'tariff' => $vehicle['tariff']
        ]);
    }

    $quote->delete();

    // 2️⃣ Send to SuperDispatch
    try {
        $clientId = env('SUPERDISPATCH_CLIENT_ID');
        $clientSecret = env('SUPERDISPATCH_CLIENT_SECRET');

        // Get API token
        $tokenResponse = Http::withBasicAuth($clientId, $clientSecret)
            ->asForm()
            ->post('https://api.shipper.superdispatch.com/oauth/token', [
                'grant_type' => 'client_credentials',
            ]);

        if (!$tokenResponse->successful()) {
            return redirect()->route('orders.edit', $order->id)
                ->with('error', 'Order created locally but failed to authenticate with SuperDispatch API.');
        }

        $accessToken = $tokenResponse['access_token'];

        // Build payload exactly as required
     $payload = [
    "number" => "ORDER-$order->id",
    "inspection_type" => "standard",
    "purchase_order_number" => "PO 0006",
    "dispatcher_name" => "Sherry Turner",
    "sales_representative" => "Alma Dubois",
    "price" => $order->tariff,
    "broker_fee" => 50,
    "instructions" => "string",
    "loadboard_instructions" => "string",
    "payment" => [
        "method" => "other",
        "terms" => "other",
        "notes" => "The company (broker, dealer, auction, rental company, etc.) that originated this dispatch sheet.",
        "amount" => 550,
        "reference_number" => "YWO-0293",
        "sent_date" => "2019-11-19T10:33:29.112+0000"
    ],
    "customer_payment" => [
        "tariff" => 3,
        "deposit" => 140,
        "amount" => 100,
        "terms" => "2_days",
        "notes" => "The company (broker, dealer, auction, rental company, etc.) that originated this dispatch sheet.",
        "method" => "cash",
        "reference_number" => "string",
        "received_date" => "2019-11-19T10:33:29.112+0000"
    ],
    "invoice" => [
        "adjusted_invoice_date" => "2019-11-19T10:33:29.112+0000",
        "date" => null,
        "number" => null,
        "sent_date" => null
    ],
    "pickup" => [
        "first_available_pickup_date" => $order->picked_up,
        "scheduled_at" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at" => "2019-11-22T10:33:29.112+0000",
        "scheduled_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "notes" => "string",
        "date_type" => "estimated",
        "save_as_new" => null,
        "save_as_new_contact" => null,
        "venue" => [
            "address" => "8 Philmont Dr.",
            "city" => "Memphis",
            "state" => "TN",
            "zip" => 38106,
            "name" => "First Rate Choice",
            "business_type" => "DEALER",
            "contact_name" => "Mary Johnson",
            "contact_title" => "Billing",
            "contact_email" => null,
            "contact_phone" => "202-555-0147",
            "contact_mobile_phone" => "202-555-0148"
        ]
    ],
    "delivery" => [
        "scheduled_at" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at" => "2019-11-22T10:33:29.112+0000",
        "scheduled_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "notes" => "string",
        "date_type" => "estimated",
        "save_as_new" => null,
        "save_as_new_contact" => null,
        "venue" => [
            "address" => "8 Philmont Dr.",
            "city" => "Memphis",
            "state" => "TN",
            "zip" => 38106,
            "name" => "First Rate Choice",
            "business_type" => "DEALER",
            "contact_name" => "Mary Johnson",
            "contact_title" => "Billing",
            "contact_email" => null,
            "contact_phone" => "202-555-0147",
            "contact_mobile_phone" => "202-555-0148"
        ]
    ],
    "customer" => [
        "address" => "8 Philmont Dr.",
        "city" => "Memphis",
        "state" => "TN",
        "zip" => 38106,
        "name" => "First Rate Choice", // required for API validation
        "business_type" => "DEALER",
        "email" => "user@example.com",
        "notes" => "Test note",
        "phone" => "202-555-0173",
        "save_as_new" => true,
        "contact_name" => "Alan Parrish",
        "contact_title" => "Billing",
        "contact_phone" => "202-555-0173",
        "contact_mobile_phone" => "202-555-0174",
        "contact_email" => "frchoice@gmail.com",
        "save_as_new_contact" => true
    ],
    "vehicles" => [
        [
            "status" => "new",
            "vin" => "1G8AL52F03Z157046",
            "year" => 2012,
            "make" => "BMW",
            "model" => "X6",
            "color" => "string",
            "curb_weight" => 2729,
            "curb_weight_unit" => "lbs",
            "inspection_type" => "standard",
            "is_modified" => true,
            "is_inoperable" => false,
            "lot_number" => "string",
            "price" => 60,
            "tariff" => 3,
            "type" => "sedan"
        ]
    ],
    "transport_type" => "OPEN",
    "tags" => ["new", "old"]
];


        // Send to API
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://api.shipper.superdispatch.com/v1/public/orders', $payload);

   if (!$apiResponse->successful()) {
        dd([
            'status' => $apiResponse->status(),
            'body' => $apiResponse->body(),
            'json' => $apiResponse->json(),
        ]);
    }

    return response()->json([
        'message' => 'Dispatch created successfully!',
        'data' => $apiResponse->json(),
    ]);

    } catch (\Exception $e) {
        return redirect()->route('orders.edit', $order->id)
            ->with('error', 'Order created locally but API request failed: ' . $e->getMessage());
    }


}

}
