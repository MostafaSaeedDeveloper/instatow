<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function getOrders(Request $request)
    {
        $columns = ['serial', 'year', 'make', 'model', 'from_city', 'to_city', 'ship_via', 'specific_date', 'customer_id', 'status'];

        $query = Order::with('customer')->select('*');

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
        $orders = $query->skip($request->start)->take($request->length)->get();

        $data = $orders->map(function ($order) {
            return [
                'id'=>"<a href='". route('orders.edit', $order->id) ."'>{$order->serial}</a>",
                'customer' => "<a href=" . route('customers.show', $order->customer->id) . ">{$order->customer->first_name} {$order->customer->last_name}</a>",
                'vehicle' =>  $order->vehicles->map(function ($vehicle) {
                    return "{$vehicle->year} {$vehicle->make} {$vehicle->model}";
                })->implode('<hr>'),
                'type'=>$order->vehicles->map(function ($vehicle) {
                    return "{$vehicle->type}";
                })->implode('<hr>'),
                'orig'=>"{$order->from_zip} : {$order->from_city} {$order->from_state}",
                'dest'=>"{$order->to_zip} : {$order->to_city} {$order->to_state}",
                'estship' => view('admin.orders.estship', ['order' => $order])->render(),
                'tariff' => "$ $order->tariff",
                'carrier_pay' => "$ $order->carrier_pay",
                'status' => $order->status,
                'actions' => view('admin.orders.actions', ['order' => $order])->render(),
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
        return view('admin.orders.create', compact('customers', 'states'));
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

        $order = Order::create([
            'serial' => rand(100000000, 999999999),

            // Customer
            'customer_id' => $customer_id,

            // From Location
            'from_working_hours_days' => $request->from_working_hours_days,
            'from_working_hours_time' => $request->from_working_hours_time,
            'from_forklift' => $request->from_forklift,
            'from_contact_name' => $request->from_contact_name,
            'from_contact_phone' => $request->from_contact_phone,
            'from_contact_phone1' => $request->from_contact_phone1,
            'from_contact_buyer_number' => $request->from_contact_buyer_number,
            'from_contact_company' => $request->from_contact_company,
            'from_address' => $request->from_address,
            'from_address2' => $request->from_address2,
            'from_city' => $request->from_city,
            'from_state' => $request->from_state,
            'from_zip' => $request->from_zip,
            'from_country' => $request->from_country,

            // To Location
            'to_working_hours_days' => $request->to_working_hours_days,
            'to_working_hours_time' => $request->to_working_hours_time,
            'to_forklift' => $request->to_forklift,
            'to_contact_name' => $request->to_contact_name,
            'to_contact_phone' => $request->to_contact_phone,
            'to_contact_phone1' => $request->to_contact_phone1,
            'to_contact_buyer_number' => $request->to_contact_buyer_number,
            'to_contact_company' => $request->to_contact_company,
            'to_address' => $request->to_address,
            'to_address2' => $request->to_address2,
            'to_city' => $request->to_city,
            'to_state' => $request->to_state,
            'to_zip' => $request->to_zip,
            'to_country' => $request->to_country,

            // Shipping
            'picked_up' => $request->picked_up ?? 'Flexible',
            'pickup_date' => $request->pickup_date,
            'load_date_type' => $request->load_date_type ?? 'Estimated',
            'load_date' => $request->load_date,
            'delivery_date_type' => $request->delivery_date_type ?? 'Estimated',
            'delivery_date' => $request->delivery_date,
            'run' => $request->run ?? true,
            'ship_via' => $request->ship_via ?? 'open',
            'stuff_type' => $request->stuff_type,
            'stuff_calc' => $request->stuff_calc,
            'stuff_description' => $request->stuff_description,
            'notes_from_customer' => $request->notes_from_customer,
            'notes_to_customer' => $request->notes_to_customer,
            'notes_for_carrier' => $request->notes_for_carrier,

            // Payment
            'tariff' => $request->total_tariff,
            'deposit' => $request->total_deposit,
            'carrier_pay' => $request->carrier_pay,
            'paid_by' => $request->paid_by,
            'payment_method' => $request->payment_method,
            'time_paid' => $request->time_paid ?? 'On Delivery',
            'status'=>'New Order'
        ]);

        foreach($request->vehicles as $vehicle) {
            $order->vehicles()->create([
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'type' => $vehicle['type'],
                'tariff'=>$vehicle['tariff']
            ]);
        }


        return redirect()->route('orders.index')->with('success', 'Order Succesfully Added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $states = DB::table('states')->select('name', 'country_code', 'iso2')->where('country_code', 'US')->get();
        return view('admin.orders.edit', compact('order', 'customers', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
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

        $order->update([
            // Customer
            'customer_id' => $customer_id,

            // From Location
            'from_working_hours_days' => $request->from_working_hours_days,
            'from_working_hours_time' => $request->from_working_hours_time,
            'from_forklift' => $request->from_forklift,
            'from_contact_name' => $request->from_contact_name,
            'from_contact_phone' => $request->from_contact_phone,
            'from_contact_phone1' => $request->from_contact_phone1,
            'from_contact_buyer_number' => $request->from_contact_buyer_number,
            'from_contact_company' => $request->from_contact_company,
            'from_address' => $request->from_address,
            'from_address2' => $request->from_address2,
            'from_city' => $request->from_city,
            'from_state' => $request->from_state,
            'from_zip' => $request->from_zip,
            'from_country' => $request->from_country,

            // To Location
            'to_working_hours_days' => $request->to_working_hours_days,
            'to_working_hours_time' => $request->to_working_hours_time,
            'to_forklift' => $request->to_forklift,
            'to_contact_name' => $request->to_contact_name,
            'to_contact_phone' => $request->to_contact_phone,
            'to_contact_phone1' => $request->to_contact_phone1,
            'to_contact_buyer_number' => $request->to_contact_buyer_number,
            'to_contact_company' => $request->to_contact_company,
            'to_address' => $request->to_address,
            'to_address2' => $request->to_address2,
            'to_city' => $request->to_city,
            'to_state' => $request->to_state,
            'to_zip' => $request->to_zip,
            'to_country' => $request->to_country,

            // Shipping
            'picked_up' => $request->picked_up ?? 'Flexible',
            'pickup_date' => $request->pickup_date,
            'load_date_type' => $request->load_date_type ?? 'Estimated',
            'load_date' => $request->load_date,
            'delivery_date_type' => $request->delivery_date_type ?? 'Estimated',
            'delivery_date' => $request->delivery_date,
            'run' => $request->run ?? true,
            'ship_via' => $request->ship_via ?? 'open',
            'stuff_type' => $request->stuff_type,
            'stuff_calc' => $request->stuff_calc,
            'stuff_description' => $request->stuff_description,
            'notes_from_customer' => $request->notes_from_customer,
            'notes_to_customer' => $request->notes_to_customer,
            'notes_for_carrier' => $request->notes_for_carrier,

            // Payment
            'tariff' => $request->total_tariff,
            'deposit' => $request->total_deposit,
            'carrier_pay' => $request->carrier_pay,
            'paid_by' => $request->paid_by,
            'payment_method' => $request->payment_method,
            'time_paid' => $request->time_paid ?? 'On Delivery',
            'status'=>'New Order'
        ]);


       $order->vehicles()->delete();

       foreach($request->vehicles as $vehicle) {
           $order->vehicles()->create([
               'year' => $vehicle['year'],
               'make' => $vehicle['make'],
               'model' => $vehicle['model'],
               'type' => $vehicle['type'],
               'tariff'=>$vehicle['tariff']
           ]);
       }


       return back()->with('success', 'Order is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->vehicles()->delete();
        $order->delete();
        return back()->with('success', 'Order Deleted Succesfully !');
    }
}
