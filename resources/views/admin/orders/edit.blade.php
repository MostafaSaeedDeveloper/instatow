@extends('admin.master')


@section('content')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Order #{{$order->serial}}</h1>
    </div>
  </div>

  <form action="{{route('orders.update', $order->id)}}" method="POST">
    @method('PATCH')
    @csrf
  <div class="content content-full content-boxed">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Customer Information </h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select" id="customer_id" name="customer_id" style="width: 100%;" data-placeholder="Choose one..">
                                            <option value="new" selected>New Customer</option>
                                            @foreach ($customers as $customer)
                                            <option {{$customer->id == $order->customer_id ? 'selected' : ''}} value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">Select Customer</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="first_name" value="{{$order->customer->first_name}}">
                                        <label class="form-label" for="example-select-floating">First Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="last_name" value="{{$order->customer->last_name}}">
                                        <label class="form-label" for="example-select-floating">Last Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="email" name="email" value="{{$order->customer->email}}">
                                        <label class="form-label" for="example-select-floating">Email</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone" value="{{$order->customer->phone}}">
                                        <label class="form-label" for="example-select-floating">Phone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone2" value="{{$order->customer->phone2}}">
                                        <label class="form-label" for="example-select-floating">Phone2</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="cellphone" value="{{$order->customer->cellphone}}">
                                        <label class="form-label" for="example-select-floating">Cellphone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control city" type="text" name="city" value="{{$order->customer->city}}">
                                        <label class="form-label" for="example-select-floating">City</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select state" id="example-select2" name="state" style="width: 100%;" data-placeholder="Choose one..">
                                            <option>Select State</option>
                                            @foreach ($states as $state)
                                            <option  {{$order->customer->state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">State</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <input class="form-control zip" type="text" name="zip" value="{{$order->customer->zip}}">
                                        <label class="form-label" for="example-select-floating">Zip</label>
                                        <ul class="zip-autocomplete"></ul>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example">
                                            <option value="United Status" selected>United Status</option>
                                          </select>
                                     <label class="form-label" for="example-select-floating">Country</label>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="address_1" value="{{$order->customer->address_1}}">
                                        <input class="form-control" type="text" name="address_2" value="{{$order->customer->address_2}}">
                                        <label class="form-label" for="example-select-floating">Address</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    {{-- Pickup --}}
                    <div class="col-md-12">
                        <div class="block block-rounded">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Pickup Contact and Location
                                <a href="javascript:void(0)" class="exchange-locations"><i class="fas fa-retweet"></i></a>
                            </h3>
                          </div>
                          <div class="block-content">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="row">
                                        <div class="text-right">
                                            <label class="form-label" for="example-select-floating">Working hours</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="from_working_hours_days" value="{{$order->from_working_hours_days}}">
                                                <label class="form-label" for="example-select-floating">Days</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="from_working_hours_time" value="{{$order->from_working_hours_time}}">
                                                <label class="form-label" for="example-select-floating">Time</label>
                                              </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <select class="form-select" name="from_forklift">
                                                    <option {{$order->from_forklift == '' ? 'selected' : ''}} value="">Select One</option>
                                                    <option {{$order->from_forklift == 'Provided' ? 'selected' : ''}} value="Provided">Provided</option>
                                                    <option {{$order->from_forklift == 'Not Provided' ? 'selected' : ''}} value="Not Provided">Not Provided</option>
                                                  </select>
                                             <label class="form-label" for="example-select-floating">Forklift</label>
                                              </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="from_address" value="{{$order->from_address}}">
                                                <input class="form-control" type="text" name="from_address2" value="{{$order->from_address2}}">
                                                <label class="form-label" for="example-select-floating">Address</label>
                                              </div>
                                        </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control city" type="text" name="from_city" value="{{$order->from_city}}">
                                                  <label class="form-label" for="example-select-floating">City</label>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-4">
                                                  <select class="js-select2 form-select state" id="example-select2" name="from_state" style="width: 100%;" data-placeholder="Choose one..">
                                                      <option>Select State</option>
                                                      @foreach ($states as $state)
                                                      <option {{$order->from_state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                                      @endforeach
                                                    </select>
                                                  <label class="form-label" for="example-select-floating">State</label>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control zip" type="text" name="from_zip" value="{{$order->from_zip}}">
                                                  <label class="form-label" for="example-select-floating">Zip</label>
                                                  <ul class="zip-autocomplete"></ul>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <select class="form-select" id="example-select-floating" name="from_country" aria-label="Floating label select example">
                                                      <option value="United Status" selected>United Status</option>
                                                    </select>
                                               <label class="form-label" for="example-select-floating">Country</label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 d-flex align-items-center">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="from_contact_name" value="{{$order->from_contact_name}}">
                                                  <label class="form-label" for="example-select-floating">Contact Name</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="from_contact_phone" value="{{$order->from_contact_phone}}">
                                                  <label class="form-label" for="example-select-floating">Phone 1</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="from_contact_phone1" value="{{$order->from_contact_phone1}}">
                                                  <label class="form-label" for="example-select-floating">Phone 2</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="from_contact_company" value="{{$order->from_contact_company}}">
                                                  <label class="form-label" for="example-select-floating">Company Name</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="from_contact_buyer_number" value="{{$order->from_contact_buyer_number}}">
                                                  <label class="form-label" for="example-select-floating">Buyer Number</label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      {{-- End Pickup --}}


                    {{-- Delivery --}}
                    <div class="col-md-12">
                        <div class="block block-rounded">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Delivery Contact and Location
                                <a href="javascript:void(0)" class="exchange-locations"><i class="fas fa-retweet"></i></a>
                            </h3>
                          </div>
                          <div class="block-content">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="row">
                                        <div class="text-right">
                                            <label class="form-label" for="example-select-floating">Working hours</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="to_working_hours_days" value="{{$order->to_working_hours_days}}">
                                                <label class="form-label" for="example-select-floating">Days</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="to_working_hours_time" value="{{$order->to_working_hours_time}}">
                                                <label class="form-label" for="example-select-floating">Time</label>
                                              </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <select class="form-select" name="to_forklift">
                                                    <option {{$order->to_forklift == '' ? 'selected' : ''}} value="">Select One</option>
                                                    <option {{$order->to_forklift == 'Provided' ? 'selected' : ''}} value="Provided">Provided</option>
                                                    <option {{$order->to_forklift == 'Not Provided' ? 'selected' : ''}} value="Not Provided">Not Provided</option>
                                                  </select>
                                             <label class="form-label" for="example-select-floating">Forklift</label>
                                              </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" type="text" name="to_address" value="{{$order->to_address}}">
                                                <input class="form-control" type="text" name="to_address2" value="{{$order->to_address2}}">
                                                <label class="form-label" for="example-select-floating">Address</label>
                                        </div>
                                        </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control city" type="text" name="to_city" value="{{$order->to_city}}">
                                                  <label class="form-label" for="example-select-floating">City</label>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-4">
                                                  <select class="js-select2 form-select state" id="example-select2" name="to_state" style="width: 100%;" data-placeholder="Choose one..">
                                                      <option>Select State</option>
                                                      @foreach ($states as $state)
                                                      <option {{$order->to_state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                                      @endforeach
                                                    </select>
                                                  <label class="form-label" for="example-select-floating">State</label>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control zip" type="text" name="to_zip" value="{{$order->to_zip}}">
                                                  <label class="form-label" for="example-select-floating">Zip</label>
                                                  <ul class="zip-autocomplete"></ul>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <select class="form-select" id="example-select-floating" name="to_country" aria-label="Floating label select example">
                                                      <option value="United Status" selected>United Status</option>
                                                    </select>
                                               <label class="form-label" for="example-select-floating">Country</label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 d-flex align-items-center">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="to_contact_name" value="{{$order->to_contact_name}}">
                                                  <label class="form-label" for="example-select-floating">Contact Name</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="to_contact_phone" value="{{$order->to_contact_phone}}">
                                                  <label class="form-label" for="example-select-floating">Phone 1</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="to_contact_phone1" value="{{$order->to_contact_phone1}}">
                                                  <label class="form-label" for="example-select-floating">Phone 2</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="to_contact_company" value="{{$order->to_contact_company}}">
                                                  <label class="form-label" for="example-select-floating">Company Name</label>
                                                </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-floating mb-4">
                                                  <input class="form-control" type="text" name="to_contact_buyer_number" value="{{$order->to_contact_buyer_number}}">
                                                  <label class="form-label" for="example-select-floating">Buyer Number</label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      {{-- End Delivery --}}


                    {{-- Shipping Information --}}
                    <div class="col-md-12">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Shipping Information </h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input class="form-control" type="date" name="pickup_date" value="{{$order->pickup_date}}">
                                            <label class="form-label" for="example-select-floating">1st Avail. Pickup Date *</label>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <select class="js-select2 form-select" id="example-select2" name="load_date_type" style="width: 100%;" data-placeholder="Choose one..">
                                                <option {{$order->load_date_type == 'Estimated' ? 'selected' : ''}} value="Estimated">Estimated</option>
                                                <option {{$order->load_date_type == 'Exactly' ? 'selected' : ''}} value="Exactly">Exactly</option>
                                                <option {{$order->load_date_type == 'No Earlier Than' ? 'selected' : ''}} value="No Earlier Than">No Earlier Than</option>
                                                <option {{$order->load_date_type == 'No Later Than' ? 'selected' : ''}} value="No Later Than">No Later Than</option>
                                              </select>
                                            <label class="form-label" for="example-select-floating">Load Date</label>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                              <input class="form-control" type="date" name="load_date" placeholder="d/m/y" value="{{$order->load_date}}">
                                              <label class="form-label" for="example-select-floating">Load Date</label>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <select class="js-select2 form-select" id="example-select2" name="delivery_date_type" style="width: 100%;" data-placeholder="Choose one..">
                                                <option {{$order->delivery_date_type == 'Estimated' ? 'selected' : ''}} value="Estimated">Estimated</option>
                                                <option {{$order->delivery_date_type == 'Exactly' ? 'selected' : ''}} value="Exactly">Exactly</option>
                                                <option {{$order->delivery_date_type == 'No Earlier Than' ? 'selected' : ''}} value="No Earlier Than">No Earlier Than</option>
                                                <option {{$order->delivery_date_type == 'No Later Than' ? 'selected' : ''}} value="No Later Than">No Later Than</option>
                                              </select>
                                            <label class="form-label" for="example-select-floating">Delivery Date</label>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                              <input class="form-control" type="date" name="delivery_date" value="{{$order->delivery_date}}">
                                            <label class="form-label" for="example-select-floating">Delivery Date</label>
                                          </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="example-select-floating" name="ship_via" aria-label="Floating label select example">
                                            <option {{$order->ship_via == 'open' ? 'selected' : ''}} value="open" selected="">Open</option>
                                            <option {{$order->ship_via == 'enclosed' ? 'selected' : ''}} value="enclosed">Enclosed</option>
                                            <option {{$order->ship_via == 'driveaway' ? 'selected' : ''}} value="driveaway">Driveaway</option>
                                          </select>
                                     <label class="form-label" for="example-select-floating">Ship Via</label>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label">Vehicle Run ?</label>
                                        <div class="space-x-2">
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="run1" name="run" value="1" checked="">
                                            <label class="form-check-label" for="run1">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="run2" name="run" value="0">
                                            <label class="form-check-label" for="run2">No</label>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select" id="stuff_type" name="stuff_type" style="width: 100%;" data-placeholder="Choose one..">
                                            <option {{$order->stuff_type == '' ? 'selected' : ''}} value="">Select One</option>
                                            <option {{$order->stuff_type == 'Need confirmation' ? 'selected' : ''}} value="Need confirmation">Need confirmation</option>
                                            <option {{$order->stuff_type == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                                            <option {{$order->stuff_type == 'No' ? 'selected' : ''}} value="No">No</option>
                                          </select>
                                        <label class="form-label" for="example-select-floating">Stuff</label>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select" disabled id="stuff_calc" name="stuff_calc" style="width: 100%;" data-placeholder="Choose one..">
                                            <option {{$order->stuff_calc == '' ? 'selected' : ''}} value="">Select One</option>
                                            <option {{$order->stuff_calc == 'Around' ? 'selected' : ''}} value="Around">Around</option>
                                            <option {{$order->stuff_calc == 'Not more' ? 'selected' : ''}} value="Not more">Not more</option>
                                          </select>
                                        <label class="form-label" for="example-select-floating"> </label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                          <input class="form-control" id="stuff_description" disabled type="text" name="stuff_description" value="{{$order->stuff_description}}">
                                        <label class="form-label" for="example-select-floating">description, lbs</label>
                                      </div>
                                </div>
                                <div class="col-md-1">
                                    lbs
                                </div>
                                </div>

                                <div class="col-md-6 row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                           <textarea class="form-control" name="notes_from_customer" style="height: 100px">{{$order->notes_from_customer}}</textarea>
                                            <label class="form-label" for="example-select-floating">Notes From Customer</label>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                           <textarea class="form-control" name="notes_to_customer" style="height: 100px">{{$order->notes_to_customer}}</textarea>
                                            <label class="form-label" for="example-select-floating">Information for customer</label>
                                            <small>Appears on Customer Invoice & Shipping Order Form</small>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                           <textarea class="form-control" name="notes_for_carrier" style="height: 100px">{{$order->notes_for_carrier}}</textarea>
                                            <label class="form-label" for="example-select-floating">Information for carrier</label>
                                            <small>Put here any additional information, like pick up and delivery windows, dimensions conditions etc - this field will be seem by carrier before the load request</small>
                                          </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                      </div>
                    </div>
                                        {{-- End Shipping Infromation --}}
                    {{-- Vehicle Information --}}
                    <div class="col-md-12">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Vehicle Information </h3>
                          <button type="button" class="btn btn-success btn-sm" id="addVehicle">+ Add Vehicle</button>
                        </div>
                        <div class="block-content"  id="vehicleContainer">
                            @php $v_index = 0; @endphp
                            @foreach ($order->vehicles as $vehicle)
                            <div class="vehicle-item">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-floating mb-4">
                                            <input class="form-control year" type="number" name="vehicles[{{$v_index}}][year]" value="{{$vehicle->year}}">
                                            <label class="form-label" for="example-select-floating">Year</label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input class="form-control make" type="text" name="vehicles[{{$v_index}}][make]" value="{{$vehicle->make}}">
                                            <label class="form-label" for="example-select-floating">Make</label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input class="form-control model" type="text" name="vehicles[{{$v_index}}][model]" value="{{$vehicle->model}}">
                                            <label class="form-label" for="example-select-floating">Model</label>
                                            <a href="https://www.google.com/search?tbm=isch&amp;q=" class="google_search">Search images</a>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <select class="js-select2 form-select" name="vehicles[{{$v_index}}][type]" style="width: 100%;" data-placeholder="Choose one..">
                                                <option {{$vehicle->type == '' ? 'selected' : ''}} value="">Select One</option>
                                                <option {{$vehicle->type == 'Coupe' ? 'selected' : ''}} value="Coupe">Coupe</option>
                                                <option {{$vehicle->type == 'Sedan Small' ? 'selected' : ''}} value="Sedan Small">Sedan Small</option>
                                                <option {{$vehicle->type == 'Sedan Midsize' ? 'selected' : ''}} value="Sedan Midsize">Sedan Midsize</option>
                                                <option {{$vehicle->type == 'Sedan Large' ? 'selected' : ''}} value="Sedan Large">Sedan Large</option>
                                                <option {{$vehicle->type == 'Convertible' ? 'selected' : ''}} value="Convertible">Convertible</option>
                                                <option {{$vehicle->type == 'Pickup Small' ? 'selected' : ''}} value="Pickup Small">Pickup Small</option>
                                                <option {{$vehicle->type == 'Pickup Crew Cab' ? 'selected' : ''}} value="Pickup Crew Cab">Pickup Crew Cab</option>
                                                <option {{$vehicle->type == 'Pickup Full-size' ? 'selected' : ''}} value="Pickup Full-size">Pickup Full-size</option>
                                                <option {{$vehicle->type == 'Pickup Extd. Cab' ? 'selected' : ''}} value="Pickup Extd. Cab">Pickup Extd. Cab</option>
                                                <option {{$vehicle->type == 'Heavy Equipment' ? 'selected' : ''}} value="Heavy Equipment">Heavy Equipment</option>
                                                <option {{$vehicle->type == 'RV' ? 'selected' : ''}} value="RV">RV</option>
                                                <option {{$vehicle->type == 'Dually' ? 'selected' : ''}} value="Dually">Dually</option>
                                                <option {{$vehicle->type == 'SUV Small' ? 'selected' : ''}} value="SUV Small">SUV Small</option>
                                                <option {{$vehicle->type == 'SUV Mid-size' ? 'selected' : ''}} value="SUV Mid-size">SUV Mid-size</option>
                                                <option {{$vehicle->type == 'SUV Large' ? 'selected' : ''}} value="SUV Large">SUV Large</option>
                                                <option {{$vehicle->type == 'Travel Trailer' ? 'selected' : ''}} value="Travel Trailer">Travel Trailer</option>
                                                <option {{$vehicle->type == 'Van Mini' ? 'selected' : ''}} value="Van Mini">Van Mini</option>
                                                <option {{$vehicle->type == 'Van Full-size' ? 'selected' : ''}} value="Van Full-size">Van Full-size</option>
                                                <option {{$vehicle->type == 'Van Extd. Length' ? 'selected' : ''}} value="Van Extd. Length">Van Extd. Length</option>
                                                <option {{$vehicle->type == 'Van Pop-Top' ? 'selected' : ''}} value="Van Pop-Top">Van Pop-Top</option>
                                                <option {{$vehicle->type == 'Motorcycle' ? 'selected' : ''}} value="Motorcycle">Motorcycle</option>
                                                <option {{$vehicle->type == 'Boat' ? 'selected' : ''}} value="Boat">Boat</option>
                                                <option {{$vehicle->type == 'ATV' ? 'selected' : ''}} value="ATV">ATV</option>
                                                <option {{$vehicle->type == 'UTV' ? 'selected' : ''}} value="UTV">UTV</option>
                                                <option {{$vehicle->type == 'Power boat' ? 'selected' : ''}} value="Power boat">Power boat</option>
                                                <option {{$vehicle->type == 'Sailboat' ? 'selected' : ''}} value="Sailboat">Sailboat</option>
                                                <option {{$vehicle->type == 'Aircraft' ? 'selected' : ''}} value="Aircraft">Aircraft</option>
                                                <option {{$vehicle->type == 'NeedAHauler' ? 'selected' : ''}} value="NeedAHauler">NeedAHauler</option>
                                                <option {{$vehicle->type == 'Freight' ? 'selected' : ''}} value="Freight">Freight</option>
                                                <option {{$vehicle->type == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                                              </select>
                                            <label class="form-label" for="example-select-floating">Type</label>
                                          </div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <div class="form-floating">
                                              <input type="number" name="vehicles[{{$v_index}}][tariff]" class="form-control tariff" placeholder="Tariff" value="{{$vehicle->tariff}}">
                                              <label for="example-group1-floating3">Tariff</label>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm removeVehicle">Remove</button>
                            </div>
                            @php $v_index++; @endphp
                            @endforeach
                        </div>
                      </div>

                    </div>
                    <div class="col-md-12">
                        <div class="block block-rounded">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Pricing Information</h3>
                          </div>
                          <div class="block-content pb-4">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="control-label col-sm-5">
                                        Total Tariff:
                                    </label>

                                    <div class="col-sm-6">
                                    <span class="total_tariff lh-34">
                                        $ <span class="value">{{$order->tariff}}</span>
                                    </span>
                                        <input type="hidden" value="{{$order->tariff}}" name="total_tariff">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="control-label col-sm-5">
                                        Required Deposit:
                                    </label>

                                    <div class="col-sm-6">
                                    <span class="total_deposit lh-34">
                                        $ <span class="value">{{$order->deposit}}</span>
                                    </span>
                                        <input type="hidden" value="{{$order->deposit}}" name="total_deposit">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label no-padding-right">Carrier Pay:</label>

                                    <div class="col-sm-7">
                                        <input type="text" class="form-control carrier_pay" name="carrier_pay" value="{{$order->carrier_pay}}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select" id="paid_by" name="paid_by" style="width: 100%;" data-placeholder="Choose one..">
                                            <option value="cash_to_carrier">Cash to Carrier</option>
                                            <option value="pre_payment">Additional Customer Pre-payment</option>
                                            <option value="balance_to_carrier">Balance to carrier</option>
                                          </select>
                                        <label class="form-label" for="example-select-floating">Balance Paid by</label>
                                      </div>
                                </div>
                            </div>
                            {{-- Cash To Carrier --}}
                            <div class="col-md-4">
                                <h6>Customer pays to Carrier</h6>
                                <div class="form-floating mb-4">
                                    <select class="js-select2 form-select" id="paid_by" name="payment_method" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                      </select>
                                    <label class="form-label" for="example-select-floating">Payment Method</label>
                                  </div>
                                <div class="form-floating mb-4">
                                    <select class="js-select2 form-select" id="paid_by" name="time_paid" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="On Pickup">On Pickup</option>
                                        <option value="On Delivery">On Delivery</option>
                                      </select>
                                    <label class="form-label" for="example-select-floating">Time</label>
                                  </div>
                            </div>

                        </div>
                          </div>
                        </div>
                        <button class="btn btn-primary">Save Changes</button>
                      </div>
                                        {{-- End Vehicle Infromation --}}

                  </div>
                </form>



@endsection


@section('scripts')

<script>
    $(document).ready(function () {
        let vehicleIndex = 1; // Keep track of the vehicle index

        // Add New Vehicle
        $("#addVehicle").click(function () {
            let newVehicle = $(".vehicle-item:first").clone(); // Clone the first vehicle section
            newVehicle.find("input, select").each(function () {
                let name = $(this).attr("name").replace(/\d+/, vehicleIndex); // Update index in name attribute
                $(this).attr("name", name).val(""); // Reset values
            });
            // Append new vehicle and add a remove button if not already there
            newVehicle.append('<button type="button" class="btn btn-danger btn-sm removeVehicle">Remove</button>');
            $("#vehicleContainer").append(newVehicle);
            $('.js-select2').select2();
            vehicleIndex++; // Increment index

        });

        // Remove Vehicle
        $(document).on("click", ".removeVehicle", function () {
            if ($(".vehicle-item").length > 1) {
                $(this).closest(".vehicle-item").remove();
            } else {
                alert("At least one vehicle is required!");
            }
        });


        $(document).on("click", ".google_search", function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Get the closest parent row (assuming each vehicle's inputs are inside a row)
            var parent = $(this).closest(".row");

            // Find the corresponding inputs within the same row
            var year = parent.find(".year").val().trim();
            var make = parent.find(".make").val().trim();
            var model = parent.find(".model").val().trim();

            // Construct Google Images search URL
            if (year && make && model) {
                var searchQuery = encodeURIComponent(year + " " + make + " " + model);
                var googleSearchUrl = "https://www.google.com/search?tbm=isch&q=" + searchQuery;

                // Open search in a new tab
                window.open(googleSearchUrl, "_blank");
            } else {
                alert("Please enter Year, Make, and Model before searching.");
            }
        });

        $(document).on('keyup change', '.tariff', function() {
    let totalTariff = 0;

    $('.tariff').each(function() {
        let value = parseFloat($(this).val()) || 0;
        totalTariff += value;
    });

    $('.total_tariff .value').text(totalTariff.toFixed(2)); // Update the total tariff display
    $('input[name="total_tariff"]').val(totalTariff.toFixed(2)); // Update the hidden input
});

function calculateDeposit() {
    let totalTariff = parseFloat($('.total_tariff .value').text()) || 0;
    let carrierPay = parseFloat($('.carrier_pay').val()) || 0;

    let requiredDeposit = totalTariff - carrierPay;

    $('.total_deposit .value').text(requiredDeposit.toFixed(2)); // Update the deposit display
    $('input[name="total_deposit"]').val(requiredDeposit.toFixed(2)); // Update hidden input
}

// Calculate deposit whenever tariff or carrier pay is updated
$(document).on('keyup change', '.tariff, .carrier_pay', function() {
    calculateDeposit();
});

//inputs for stuff
$('#stuff_type').change(function() {
    if($(this).val() == 'Yes') {
        $('#stuff_calc').removeAttr('disabled');
        $('#stuff_description').removeAttr('disabled');
    } else {
        $('#stuff_calc').val('').attr('disabled', 'disabled');
        $('#stuff_description').val('').attr('disabled', 'disabled');
    }
});

// Exchange Locations

$(".exchange-locations").on("click", function () {
        let fields = [
            "working_hours_days",
            "working_hours_time",
            "forklift",
            "address",
            "address2",
            "city",
            "state",
            "zip",
            "country",
            "contact_name",
            "contact_phone",
            "contact_phone1",
            "contact_company",
            "contact_buyer_number"
        ];

        fields.forEach(function (field) {
            let fromField = $(`[name='from_${field}']`);
            let toField = $(`[name='to_${field}']`);

            // Swap values
            let temp = fromField.val();
            fromField.val(toField.val());
            toField.val(temp);
        });

        // Swap selected values in dropdowns
        let fromState = $("[name='from_state']");
        let toState = $("[name='to_state']");
        let tempState = fromState.val();
        fromState.val(toState.val()).trigger("change");
        toState.val(tempState).trigger("change");

        let fromCountry = $("[name='from_country']");
        let toCountry = $("[name='to_country']");
        let tempCountry = fromCountry.val();
        fromCountry.val(toCountry.val()).trigger("change");
        toCountry.val(tempCountry).trigger("change");
    });



    });
</script>
<style>
.removeVehicle {
    margin-top: -15px;
    margin-bottom: 15px;
}
.select2-container.select2-container--default + span {
    display: none;
}
</style>
@endsection
