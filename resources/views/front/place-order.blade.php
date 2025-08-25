@extends('front.master')


@section('content')


{{-- <section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Place Order</h1>
        </div>
    </div>
</section> --}}

<style>
    header.main-header.header-style-one, .footer-style-one{
        display: none;
    }
</style>

<section class="faqs-section" style="padding-top: 100px;height:100vh">
    <div class="icon-container-4" style="background-image: url({{asset('images/slide-object2.png')}}); background-size: contain;background-repeat: no-repeat;"></div>
    <div class="icon-arrow-3"></div>
		<div class="auto-container">
			<div class="row">

        <!-- Form Column -->
        <div class="form-column col-lg-12 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="300ms">
          <div class="inner-column">
            <!-- Contact Form -->
            <div class="contact-form">
              <div class="content-box">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <span class="sub-title">We Create Opportunity to Reach Potential</span> --}}
                        <h2 class="title words-slide-up text-split">Request a Quote</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="theme-btn btn-style-one" href="{{route('front_page')}}">Return <i class="fa fa-undo"></i></a>
                    </div>
                </div>

              </div>

              <form id="wizard-form" action="{{route('place_order')}}" method="POST">
                @csrf
                <!-- Step 1 -->
                <div class="step" id="step-1">
                    <h4>Tell us more about your Vehicle</h4>

                    <div class="row">
                    <div class="col-md-4 col-sm-4 form-group">
                        <select id="year" name="car_year" class="select2 w-100">
                          <option value="">Select Year</option>
                          @foreach($years as $year)
                          <option value="{{ $year->id }}">{{ $year->year }}</option>
                      @endforeach
                        </select>
                      </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <select name="car_make" id="make" class="select2 w-100" placeholder="" disabled required>
                            <option value="">Select year first</option>
                        </select>
                      </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <select name="car_model" id="model" class="select2 w-100" disabled required>
                            <option value="">Select make first</option>
                          </select>
                      </div>
                      <div class="col-md-4 col-sm-4 form-radio-inline">
                        <label for="doesrun">Does it run? </label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="run" id="inlineRadio1" value="1" checked>
                          <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="run" id="inlineRadio2" value="0">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                      </div>
                      <br><br>
                    </div>

                    <div class="action-buttons">
                    <button type="button" class="btn btn-primary next-btn" data-next="step-2">Continue to Step 2</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step" id="step-2" style="display: none;">
                    <h4>Step 2: Address Information</h4>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 form-group">
                            <label for="origin">Origin</label>
                            <input type="text" class="form-control" id="origin" name="origin" required>
                            <ul id="origin-autocomplete"></ul>
                          </div>
                          <div class="col-md-4 col-sm-4 form-group">
                            <label for="origin">Destination</label>
                            <input type="text" class="form-control" id="destination" name="destination" required>
                            <ul id="destination-autocomplete"></ul>
                          </div>
                          <div class="col-md-12 col-sm-12 form-radio-inline">
                            <label for="doesrun">When it’s ready to be picked up? </label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="pickup" id="pickup1" value="I’m Flexible">
                              <label class="form-check-label" for="pickup1">I’m Flexible</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="pickup" id="pickup2" value="ASAP">
                              <label class="form-check-label" for="pickup2">ASAP</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="pickup" id="pickup3" value="Specific date">
                              <label class="form-check-label" for="pickup3">Specific date</label><br>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4" id="specific_date" style="display: none">
                            <input type="date" class="form-control">
                          </div>
                    </div>

                    @if (auth('customer')->check())
                    <input type="hidden" name="customer_id" value="{{auth('customer')->user()->id}}">
                    <button type="button" class="btn btn-secondary prev-btn" data-prev="step-2">Previous</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                    @else
                    <div class="action-buttons">
                        <button type="button" class="btn btn-secondary prev-btn" data-prev="step-1">Previous</button>
                        <button type="button" class="btn btn-primary next-btn" data-next="step-3">Next</button>
                    </div>
                    @endif
                </div>
                @if (!auth('customer')->check())
                <!-- Step 3 -->
                <div class="step" id="step-3" style="display: none;margin-top:-35px">

                    <h4>Step 3: Create Your Account</h4>
                    <div class="row">
                    <div class="col-md-4 col-sm-4 form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                      </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="col-md-6 col-sm-6 form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="name" name="username" required>
                      </div>
                    <div class="col-md-6 col-sm-6 form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                      </div>


                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="accept" id="accept" value="accept" required>
                        <label class="form-check-label" for="accept">By sending this form you allow us to contact you by email, SMS, or a phone call regarding your quote</label>
                      </div>
                    </div>
                    <button type="button" class="btn btn-secondary prev-btn" data-prev="step-2">Previous</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                @endif
            </form>
              <!--Contact Form-->
              <form method="post" action="https://html.kodesolution.com/2024/caargo-html/get" id="contact-form">
                <div class="row">
                  {{-- <div class="form-group col-lg-12">
                    <div class="input-outer">
                      <input type="email" name="Email" placeholder="Complete Name" required />
                      <span class="icon fa fa-user"></span>
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="input-outer">
                      <input type="text" name="Phone" placeholder="Email Address" required />
                      <span class="icon fa fa-envelope-open"></span>
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                    <select class="custom-select w-100">
                      <option value="">Select Freight</option>
                      <option value="">Air Freight</option>
                      <option value="">Ocean Freight</option>
                      <option value="">Rail transport</option>
                      <option value="">Cargo ship</option>
                      <option value="">Bulk cargo</option>
                    </select>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="input-outer">
                      <input type="text" name="Phone" placeholder="Weight, Kg" required />
                      <span class="icon fa fa-envelope-open"></span>
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <label>DIST (Miles):</label>
                    <div class="range-slider-one">
                      <input type="text" class="range-amount" name="field-name" readonly />
                      <div class="distance-range-slider"></div>
                    </div>
                  </div> --}}

                  {{-- <div class="form-group col-lg-12">
                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Submit Quote</span></button>
                  </div> --}}

                  <div class="icon-box" style="background-color:#fff">
                    <img style="height: 60px" src="{{asset('images/Logo.png')}}" alt="">
                    {{-- <i class="fa-solid fa-paper-plane"></i> --}}
                  </div>
                </div>
              </form>
            </div>
            <!--End Contact Form -->
          </div>
        </div>
			</div>
		</div>
	</section>




@endsection


@section('scripts')

<style>
    .page-wrapper {
        background-image: url({{asset('images/footer-bg')}});
        overflow: auto;
    }
    h4 {
        color: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff;
    padding-left: 0;
}
.select2-results__option {
    padding: 0 10px;
    color: #000000;
}
.select2-container--default.select2-container--disabled .select2-selection--single {
    background-color: #545454;
    cursor: default;
}
label {
    font-size: 20px;
    color: #fff;
}
.action-buttons {
    margin-top: 30px;
}
</style>

<script>
    $(document).ready(function() {
  // Handle Next button click
//   $('.next-btn').click(function() {
//       var nextStep = $(this).data('next');
//       var currentStep = $(this).closest('.step');

//       currentStep.hide();
//       $('#' + nextStep).show();
//   });

//   // Handle Previous button click
//   $('.prev-btn').click(function() {
//       var prevStep = $(this).data('prev');
//       var currentStep = $(this).closest('.step');

//       currentStep.hide();
//       $('#' + prevStep).show();
//   });


  $('#year').change(function() {
    var year = $(this).val();
    $('#make').prop('disabled', false);
    $.ajax({
        url: "{{route('getMakesByYear')}}",
        data: {
            year: year
        },
        method: 'GET',
        success: function(data) {
            var makeSelect = $('#make');
            makeSelect.empty(); // Clear previous options
            makeSelect.append('<option value="">Select a Make</option>');
            $.each(data, function(index, make) {
                makeSelect.append('<option value="' + make.id + '">' + make.make + '</option>');
            })
        },
    });
  });

  $('#make').change(function() {
    var year = $('#year').val();
    var make = $(this).val();
    $('#model').prop('disabled', false);
    $.ajax({
        url: "{{route('getModelsByMake')}}",
        data: {
            year: year,
            make: make
        },
        method: 'GET',
        success: function(data) {
            var modelSelect = $('#model');
            modelSelect.empty(); // Clear previous options
            modelSelect.append('<option value="">Select a Model</option>');
            $.each(data, function(index, model) {
                modelSelect.append('<option value="' + model.id + '">' + model.model + '</option>');
            })
        },
    });
  });


$('#origin').keyup(function() {
    var keyword = $(this).val();
    $.ajax({
        url: "{{route('getAddress')}}",
        type: "GET",
        data: {
            keyword: keyword
        },
        success: function(response) {
            $('#origin-autocomplete').empty();
            $('#origin-autocomplete').addClass('autocomplete');
            $('#origin-autocomplete').show();
            if (response.length > 0) {
                // Loop through the results and append them to the <ul>
                response.forEach(function(city) {
                    $('#origin-autocomplete').append('<li>' + city.zip_code + ' : ' + city.city + ', ' + city.state + '</li>');
                });
            } else {
                $('#origin-autocomplete').hide();
            }
        }
    });

});
$('#destination').keyup(function() {
    var keyword = $(this).val();
    $.ajax({
        url: "{{route('getAddress')}}",
        type: "GET",
        data: {
            keyword: keyword
        },
        success: function(response) {
            $('#destination-autocomplete').empty();
            $('#destination-autocomplete').addClass('autocomplete');
            $('#destination-autocomplete').show();
            if (response.length > 0) {
                // Loop through the results and append them to the <ul>
                response.forEach(function(city) {
                    $('#destination-autocomplete').append('<li>' + city.zip_code + ' : ' + city.city + ', ' + city.state + '</li>');
                });
            } else {
                $('#destination-autocomplete').hide();
            }
        }
    });

});

$(document).on('click', '#origin-autocomplete li', function() {
    var city = $(this).text();
    $('#origin').val(city);
    $('#origin-autocomplete').hide();
});
$(document).on('click', '#destination-autocomplete li', function() {
    var city = $(this).text();
    $('#destination').val(city);
    $('#destination-autocomplete').hide();
});

$('input[name="pickup"]').change(function() {
        if ($('#pickup3').is(':checked')) {
            $('#specific_date').show();
        } else {
            $('#specific_date').hide();
        }
    });

});
$(document).ready(function () {
    $(".next-btn").click(function () {
        let currentStep = $(this).closest(".step");

        if (validateStep(currentStep)) {
            let nextStepId = $(this).data("next");
            showStep(nextStepId);
        }
    });

    $(".prev-btn").click(function () {
        let prevStepId = $(this).data("prev");
        showStep(prevStepId);
    });

    function showStep(stepId) {
        $(".step").hide();
        $("#" + stepId).show();
    }

    function validateStep(step) {
        let isValid = true;

        // Reset previous validation errors
        step.find(".is-invalid").removeClass("is-invalid");

        // Validate required inputs (text, email, password)
        step.find("input[required], select[required]").each(function () {
            if (!$(this).val().trim()) {
                isValid = false;
                $(this).addClass("is-invalid"); // Highlight invalid fields
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        // Validate required radio buttons (at least one must be selected)
        step.find("input[type=radio][required]").each(function () {
            let name = $(this).attr("name");
            if ($(`input[name="${name}"]:checked`).length === 0) {
                isValid = false;
                $(this).closest(".form-check-inline").addClass("is-invalid"); // Highlight radio group
            } else {
                $(this).closest(".form-check-inline").removeClass("is-invalid");
            }
        });

        return isValid;
    }
});




</script>

@endsection
