@extends('admin.master')


@section('content')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">New Quote</h1>
    </div>
  </div>

  <form action="{{route('quotes.store')}}" method="POST">
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
                                        <select class="js-select2 form-select"  id="customer_id" name="customer_id" style="width: 100%;" data-placeholder="Choose one..">
                                            <option value="new" selected>New Customer</option>
                                            @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">Select Customer</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="first_name">
                                        <label class="form-label" for="example-select-floating">First Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="last_name">
                                        <label class="form-label" for="example-select-floating">Last Name</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="email" name="email">
                                        <label class="form-label" for="example-select-floating">Email</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone">
                                        <label class="form-label" for="example-select-floating">Phone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="phone2">
                                        <label class="form-label" for="example-select-floating">Phone2</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control" type="text" name="cellphone">
                                        <label class="form-label" for="example-select-floating">Cellphone</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input class="form-control city" type="text" name="city">
                                        <label class="form-label" for="example-select-floating">City</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <select class="js-select2 form-select state" id="example-select2" name="state" style="width: 100%;" data-placeholder="Choose one..">
                                            <option>Select State</option>
                                            @foreach ($states as $state)
                                            <option value="{{$state->iso2}}">{{$state->name}}</option>
                                            @endforeach
                                          </select>
                                        <label class="form-label" for="example-select-floating">State</label>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-4">
                                        <input class="form-control zip" type="text" name="zip">
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
                                        <input class="form-control" type="text" name="address_1">
                                        <input class="form-control" type="text" name="address_2">
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
                                                <input class="form-control city" type="text" name="from_city">
                                                <label class="form-label" for="example-select-floating">City</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="js-select2 form-select state" id="example-select2" name="from_state" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option>Select State</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{$state->iso2}}">{{$state->name}}</option>
                                                    @endforeach
                                                  </select>
                                                <label class="form-label" for="example-select-floating">State</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control zip" type="text" name="from_zip">
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
                                                <input class="form-control city" type="text" name="to_city">
                                                <label class="form-label" for="example-select-floating">City</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="js-select2 form-select state" id="example-select2" name="to_state" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option>Select State</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{$state->iso2}}">{{$state->name}}</option>
                                                    @endforeach
                                                  </select>
                                                <label class="form-label" for="example-select-floating">State</label>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input class="form-control zip" type="text" name="to_zip">
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
                                        <input class="form-control" type="date" name="ship_date">
                                        <label class="form-label" for="example-select-floating">Estamted Ship Date</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="example-select-floating" name="ship_via" aria-label="Floating label select example">
                                            <option value="open" selected="">Open</option>
                                            <option value="enclosed">Enclosed</option>
                                            <option value="driveaway">Driveaway</option>
                                          </select>
                                     <label class="form-label" for="example-select-floating">Ship Via</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
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

                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                       <textarea class="form-control" name="notes" style="height: 100px"></textarea>
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
                            <div class="vehicle-item">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-floating mb-4">
                                            <input class="form-control year" type="number" name="vehicles[0][year]">
                                            <label class="form-label" for="example-select-floating">Year</label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input class="form-control make" type="text" name="vehicles[0][make]">
                                            <label class="form-label" for="example-select-floating">Make</label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input class="form-control model" type="text" name="vehicles[0][model]">
                                            <label class="form-label" for="example-select-floating">Model</label>
                                            <a href="https://www.google.com/search?tbm=isch&amp;q=" class="google_search">Search images</a>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <select class="js-select2 form-select" name="vehicles[0][type]" style="width: 100%;" data-placeholder="Choose one..">
                                                <option value="">Select One</option>
                                                <option value="Coupe">Coupe</option>
                                                <option value="Sedan Small">Sedan Small</option>
                                                <option value="Sedan Midsize">Sedan Midsize</option>
                                                <option value="Sedan Large">Sedan Large</option>
                                                <option value="Convertible">Convertible</option>
                                                <option value="Pickup Small">Pickup Small</option>
                                                <option value="Pickup Crew Cab">Pickup Crew Cab</option>
                                                <option value="Pickup Full-size">Pickup Full-size</option>
                                                <option value="Pickup Extd. Cab">Pickup Extd. Cab</option>
                                                <option value="Heavy Equipment">Heavy Equipment</option>
                                                <option value="RV">RV</option>
                                                <option value="Dually">Dually</option>
                                                <option value="SUV Small">SUV Small</option>
                                                <option value="SUV Mid-size">SUV Mid-size</option>
                                                <option value="SUV Large">SUV Large</option>
                                                <option value="Travel Trailer">Travel Trailer</option>
                                                <option value="Van Mini">Van Mini</option>
                                                <option value="Van Full-size">Van Full-size</option>
                                                <option value="Van Extd. Length">Van Extd. Length</option>
                                                <option value="Van Pop-Top">Van Pop-Top</option>
                                                <option value="Motorcycle">Motorcycle</option>
                                                <option value="Boat">Boat</option>
                                                <option value="ATV">ATV</option>
                                                <option value="UTV">UTV</option>
                                                <option value="Power boat">Power boat</option>
                                                <option value="Sailboat">Sailboat</option>
                                                <option value="Aircraft">Aircraft</option>
                                                <option value="NeedAHauler">NeedAHauler</option>
                                                <option value="Freight">Freight</option>
                                                <option value="Other">Other</option>
                                              </select>
                                            <label class="form-label" for="example-select-floating">Type</label>
                                          </div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <div class="form-floating">
                                              <input type="number" name="vehicles[0][tariff]" class="form-control tariff" placeholder="Tariff">
                                              <label for="example-group1-floating3">Tariff</label>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm removeVehicle" style="display: none">Remove</button>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-12">
                        <div class="block block-rounded">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Pricing Information</h3>
                          </div>
                          <div class="block-content pb-4">
                            <div class="col-sm-4">
                                <div class="row">
                                    <label class="control-label col-sm-5">
                                        Total Tariff:
                                    </label>

                                    <div class="col-sm-6">
                                    <span class="total_tariff lh-34">
                                        $ <span class="value"></span>
                                    </span>
                                        <input type="hidden" value="" name="total_tariff">
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
