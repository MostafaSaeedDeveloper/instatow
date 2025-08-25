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

<section class="faqs-section" style="padding-top: 0px;height:100vh">
    <div class="icon-container-4" style="background-image: url({{asset('images/slide-object2.png')}}); background-size: contain;background-repeat: no-repeat;"></div>
    <div class="icon-arrow-3"></div>
		<div class="auto-container">
			<div class="row">
                        <!-- Form Column -->
        <div class="form-column col-lg-12 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="300ms">
            <div class="inner-column">
              <!-- Contact Form -->

              <div class="contact-form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @yield('order-content')



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
        background-size:cover;
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
    display: flex;
    flex-direction: row;
    align-content: space-between;
    align-items: center;
    justify-content: space-between;
}
.removeVehicle {
    margin-top: -40px;
}
.select2-container.select2-container--default + span {
    display: none;
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
    $('.select2').select2();
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

// Year → Make
$(document).on('change', '.year', function () {
    const $container = $(this).closest('.vehicle-item');
    const year = $(this).val();
    const makeSelect = $container.find('.make');
    const modelSelect = $container.find('.model');

    makeSelect.prop('disabled', true).html('<option>Loading...</option>');
    modelSelect.prop('disabled', true).html('<option>Select make first</option>');

    $.ajax({
        url: "{{ route('getMakesByYear') }}",
        method: 'GET',
        data: { year: year },
        success: function (data) {
            makeSelect.html('<option value="">Select a Make</option>');
            $.each(data, function (index, make) {
                makeSelect.append(`<option value="${make.id}">${make.make}</option>`);
            });
            makeSelect.prop('disabled', false).trigger('change.select2');
        }
    });
});

// Make → Model
$(document).on('change', '.make', function () {
    const $container = $(this).closest('.vehicle-item');
    const year = $container.find('.year').val();
    const make = $(this).val();
    const modelSelect = $container.find('.model');

    modelSelect.prop('disabled', true).html('<option>Loading...</option>');

    $.ajax({
        url: "{{ route('getModelsByMake') }}",
        method: 'GET',
        data: { year: year, make: make },
        success: function (data) {
            modelSelect.html('<option value="">Select a Model</option>');
            $.each(data, function (index, model) {
                modelSelect.append(`<option value="${model.id}">${model.model}</option>`);
            });
            modelSelect.prop('disabled', false).trigger('change.select2');
        }
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
