@extends('admin.master')


@section('content')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Lead #{{$lead->serial}}</h1>
    </div>
  </div>

  <form action="{{route('leads.update', $lead->id)}}" method="POST">
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
                                            <option {{$customer->id == $lead->customer_id ? 'selected' : ''}} value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">Select Customer</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="first_name" value="{{$lead->customer->first_name}}">
                                        <label class="form-label" for="example-select-floating">First Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="last_name" value="{{$lead->customer->last_name}}">
                                        <label class="form-label" for="example-select-floating">Last Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="email" name="email" value="{{$lead->customer->email}}">
                                        <label class="form-label" for="example-select-floating">Email</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone" value="{{$lead->customer->phone}}">
                                        <label class="form-label" for="example-select-floating">Phone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone2" value="{{$lead->customer->phone2}}">
                                        <label class="form-label" for="example-select-floating">Phone2</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="cellphone" value="{{$lead->customer->cellphone}}">
                                        <label class="form-label" for="example-select-floating">Cellphone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control city" type="text" name="city" value="{{$lead->customer->city}}">
                                        <label class="form-label" for="example-select-floating">City</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select state" id="example-select2" name="state" style="width: 100%;" data-placeholder="Choose one..">
                                            <option>Select State</option>
                                            @foreach ($states as $state)
                                            <option {{$lead->customer->state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">State</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <input class="form-control zip" type="text" name="zip" value="{{$lead->customer->zip}}">
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
                                        <input class="form-control" type="text" name="address_1" value="{{$lead->customer->address_1}}">
                                        <input class="form-control" type="text" name="address_2" value="{{$lead->customer->address_2}}">
                                        <label class="form-label" for="example-select-floating">Address</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>

                    {{-- Origin and Destination --}}
                    <div class="col-md-12">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Origin and Destination </h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-6">
                                    From
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <input class="form-control city" type="text" name="from_city" value="{{$lead->from_city}}">
                                                <label class="form-label" for="example-select-floating">City</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="js-select2 form-select state" id="example-select2" name="from_state" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option>Select State</option>
                                                    @foreach ($states as $state)
                                                    <option {{$lead->from_state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                                    @endforeach
                                                  </select>
                                                <label class="form-label" for="example-select-floating">State</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control zip" type="text" name="from_zip" value="{{$lead->from_zip}}">
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
                                <div class="col-md-6">
                                    To
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <input class="form-control city" type="text" name="to_city" value="{{$lead->to_city}}">
                                                <label class="form-label" for="example-select-floating">City</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="js-select2 form-select state" id="example-select2" name="to_state" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option>Select State</option>
                                                    @foreach ($states as $state)
                                                    <option  {{$lead->to_state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                                    @endforeach
                                                  </select>
                                                <label class="form-label" for="example-select-floating">State</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control zip" type="text" name="to_zip" value="{{$lead->to_zip}}">
                                                <label class="form-label" for="example-select-floating">Zip</label>
                                                <ul class="zip-autocomplete"></ul>
                                              </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <select class="form-select" id="example-select-floating" name="to_country" aria-label="Floating label select example">
                                                    <option value="United Status" selected="">United Status</option>
                                                  </select>
                                             <label class="form-label" for="example-select-floating">Country</label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                                        {{-- End Origin and Destination --}}
                    {{-- Shipping Information --}}
                    <div class="col-md-12">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Shipping Information </h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="date" name="ship_date" value="{{$lead->specific_date}}">
                                        <label class="form-label" for="example-select-floating">Estamted Ship Date</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="example-select-floating" name="ship_via" aria-label="Floating label select example">
                                            <option {{$lead->ship_via == 'open' ? 'selected' : ''}} value="open" selected="">Open</option>
                                            <option {{$lead->ship_via == 'enclosed' ? 'selected' : ''}} value="enclosed">Enclosed</option>
                                            <option {{$lead->ship_via == 'driveaway' ? 'selected' : ''}} value="driveaway">Driveaway</option>
                                          </select>
                                     <label class="form-label" for="example-select-floating">Ship Via</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label">Vehicle Run ?</label>
                                        <div class="space-x-2">
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="run1" name="run" value="1" {{$lead->run == true ? 'checked' : ''}}>
                                            <label class="form-check-label" for="run1">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="run2" name="run" value="0"  {{$lead->run == false ? 'checked' : ''}}>
                                            <label class="form-check-label" for="run2">No</label>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                       <textarea class="form-control" name="notes" style="height: 100px">{{$lead->notes}}</textarea>
                                        <label class="form-label" for="example-select-floating">Notes From Customer</label>
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
                        <div class="block-content" id="vehicleContainer">
                            @php $v_index = 0; @endphp
                            @foreach ($lead->vehicles as $vehicle)
                            <div class="vehicle-item">
                                <div class="row">
                                    <div class="col-md-3">
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
                                </div>
                                <button type="button" class="btn btn-danger btn-sm removeVehicle">Remove</button>
                            </div>
                            @php $v_index++; @endphp
                            @endforeach
                            </div>
                        </div>
                      </div>



                    </div>
                    <button class="btn btn-primary">Save Lead</button>

                                        {{-- End Vehicle Infromation --}}

                  </div>
                </form>



@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        let vehicleIndex = {{$v_index}}; // Keep track of the vehicle index

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


