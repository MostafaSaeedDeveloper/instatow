<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $states = DB::table('states')->select('name', 'country_code', 'iso2')->where('country_code', 'US')->get();
        return view('admin.customers.show', compact('customer', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'username'=>$request->username,
            'email'=>$request->email,
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

        return back()->with('success', 'Customer Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function login(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(auth('customer')->attempt($credentials)) {
            return redirect()->route('customer_account');
        }else {
            return back()->withErrors(['username'=>'Invalid credentials.']);
        }

    }

    public function logout() {
        auth('customer')->logout();
        return back();
    }

    public function updateCustomer(Request $request) {
        $customer = Customer::find($request->customer_id);
        $customer->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        if($request->password) {
            $customer->update([
                'password'=>Hash::make($request->password)
            ]);
        }

        return back()->with('success', 'Profile Updated Successfully !');
    }



}
