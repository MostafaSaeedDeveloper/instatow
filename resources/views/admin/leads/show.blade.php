@extends('admin.master')


@section('content')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Lead #{{$lead->serial}} Detail</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Leads</li>
          <li class="breadcrumb-item active" aria-current="page">Lead #{{$lead->serial}}</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content content-full content-boxed">
    <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Lead <small>Information</small></h3>
                      <div class="block-options">
                        <div class="dropdown">
                          <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                          <div class="dropdown-menu dropdown-menu-end" style="">
                            <a  id="convert-to-quote" data-bs-toggle="modal" data-bs-target="#convert_to_quote" class="dropdown-item" href="javascript:void(0)"     data-id="{{ $lead->id }}"
    data-name="{{ $lead->customer->name }}"
    data-from-city="{{ $lead->from_city }}"
    data-from-state="{{ $lead->from_state }}"
    data-from-zip="{{ $lead->from_zip }}"
    data-from-country="{{ $lead->from_country }}"
    data-to-city="{{ $lead->to_city }}"
    data-to-state="{{ $lead->to_state }}"
    data-to-zip="{{ $lead->to_zip }}"
    data-to-country="{{ $lead->to_country }}">
                               Convert To Quote
                            </a>
                             <a class="dropdown-item" href="javascript:void(0)">
                               Convert To Order
                            </a>
                            <a class="dropdown-item" href="{{route('leads.edit', $lead->id)}}">
                               Edit
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                               Cancel
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="block-content">
                      <div class="row">
                          <div class="col-md-6">
                            <h4>Customer</h4>
                            <p style="margin-bottom: 0.25rem;">{{$lead->customer->first_name}} {{$lead->customer->last_name}}</p>
                            <p class="tel">
    {{$lead->customer->phone}}
    <a class="btn btn-sm btn-info copy-phone" data-phone="{{$lead->customer->phone}}" href="javascript:void(0)">
        <i class="far fa-copy"></i>
    </a>
    <a class="btn btn-sm btn-success" href="tel:{{$lead->customer->phone}}"><i class="fas fa-phone"></i></a>
</p>

                          </div>
                          <div class="col-md-6">
                            <br>
                            <p><strong>Origin:</strong> {{$lead->from_zip}} : {{$lead->from_city}}, {{$lead->from_state}}
                              <br><strong>Destination:</strong> {{$lead->to_zip}} : {{$lead->to_city}}, {{$lead->to_state}}
                            </p>
                            <h5 style="margin-bottom: 0.25rem;">Vehicles</h5>
                            @foreach ($lead->vehicles as $vehicle)
                                    <p>{{$vehicle->year . ' ' . $vehicle->make . ' ' . $vehicle->model}}
                            @endforeach
                            </p>
                          </div>
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Notes </h3>
                        </div>
                        <div class="block-content">
                          <div class="form-floating mb-4">
                            <textarea class="form-control" id="example-textarea-floating" name="example-textarea-floating" style="height: 100px" placeholder="Leave a comment here"></textarea>
                            <label class="form-label" for="example-textarea-floating">Note</label>
                            <br>
                            <button class="btn btn-primary">Add Note</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="block hero flex-column mb-0 bg-body-dark">
                        <!-- Chat #5 Header -->
                        <div class="block-header w-100 bg-body-dark" style="min-height: 68px;">
                          <h3 class="block-title">
                            <a class="fs-sm fw-semibold ms-2" href="javascript:void(0)">To: 123543634</a>
                          </h3>
                        </div>
                        <!-- END Chat #5 Header -->

                        <!-- Chat #5 Messages -->
                        <div
                          class="js-chat-messages block-content block-content-full text-break overflow-y-auto w-100 flex-grow-1 px-lg-8 px-xlg-10 bg-body"
                          data-chat-id="5">
                          <div class="me-4">
                            <div class="fs-sm text-muted animated fadeIn my-2">12-10-2004</div>
                          </div>
                          <div class="me-4">
                            <div
                              class="fs-sm d-inline-block fw-medium animated fadeIn bg-body-light border-3 px-3 py-2 mb-2 shadow-sm mw-100 border-start border-dark rounded-end">
                              Hi there!</div>
                          </div>

                        </div>

                        <!-- Chat #5 Input -->
                        <div class="js-chat-form block-content p-3 w-100 d-flex align-items-center bg-body-dark" style="min-height: 70px; height: 70px;">
                          <form class="w-100" action="db_chat.html" method="POST">
                            <div class="input-group dropup">
                              <button type="button" class="btn btn-link d-sm-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-file-alt fa-fw me-1"></i> Upload File
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-image fa-fw me-1"></i> Upload Image
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-microphone-alt fa-fw me-1"></i> Record Audio
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-smile fa-fw me-1"></i> Add Stickers
                                </a>
                              </div>
                              <input type="text" class="js-chat-input form-control form-control-alt border-0 bg-transparent" data-target-chat-id="5" placeholder="Type a message..">
                              <button type="submit" class="btn btn-link">
                                <i class="fab fa-telegram-plane opacity-50"></i>
                                <span class="d-none d-sm-inline ms-1 fw-semibold">Send</span>
                              </button>
                            </div>
                          </form>
                        </div>
                        <!-- END Chat #5 Input -->
                      </div>
                    </div>
                  </div>

                </div>




          <!-- Normal Default Modal -->
          <div class="modal" id="convert_to_quote" tabindex="-1" role="dialog" aria-labelledby="convert_to_quote" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Convert to Quote</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-1">
                    <form action="{{route('convert_to_quote')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <div class="form-floating">
                              <input type="number" class="form-control" id="example-group1-floating3" name="tariff" placeholder="Ammount">
                              <label for="example-group1-floating3">Amount</label>
                            </div>
                          </div>
                           <b style="margin-top:10px;"> Recommended Price: $<span style="color:red" id="recommended_price"></span><span id="price-error" class="text-danger d-none"></span></b><br>

                            <input type="hidden" name="lead_id" value="{{$lead->id}}">
                                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Convert to Quote</button>
                </div>
            </form>
              </div>
            </div>
          </div>
          <!-- END Normal Default Modal -->
          <!-- Recommend Price Modal -->
<div class="modal fade" id="recommendPriceModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="recommendPriceForm">
        <div class="modal-header">
          <h5 class="modal-title">Recommended Price</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" id="lead_id" name="lead_id">

<div class="form-group mb-2">
  <label>Pickup Location</label>
  <p id="pickup_location" class="form-control-plaintext fw-bold text-dark"></p>
</div>

<div class="form-group mb-2">
  <label>Delivery Location</label>
  <p id="delivery_location" class="form-control-plaintext fw-bold text-dark"></p>
</div>

          <div class="form-group mb-2">
            <label>Recommended Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number"  class="form-control" readonly>
            </div>
                          <div id="price-error" class="text-danger d-none"></div>
          </div>

          <div class="form-group mb-2">
            <label>Your Final Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" id="final_price" name="final_price" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
<button type="button" id="apply-recommended-price" class="btn btn-success">Apply Price</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection


@section('scripts')
<script>

$(document).ready(function () {
    $('#leadsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('datatable.leads') }}",
            data: function(d) {
                let urlParams = new URLSearchParams(window.location.search);
                d.customer = urlParams.get('customer');
            }
        },
        columns: [
            { data: 'id'},
            { data: 'customer'},
            { data: 'vehicle'},
            { data: 'type'},
            { data: 'orig'},
            { data: 'dest'},
            { data: 'estship'},
            { data: 'quote'},
            { data: 'actions'},
        ],
    });
});

$(document).on("click", ".copy-phone", function(e) {
    e.preventDefault();
    let phone = $(this).data("phone");
    let $btn = $(this);

    // نسخ الرقم
    navigator.clipboard.writeText(phone).then(function() {
        // تغيير شكل الزرار بعد النسخ
        $btn.removeClass("btn-info").addClass("btn-success")
            .html('<i class="fas fa-check"></i>');

        setTimeout(function() {
            $btn.removeClass("btn-success").addClass("btn-info")
                .html('<i class="far fa-copy"></i>');
        }, 2000);
    });
});


$(document).on('click', '#convert-to-quote', function(e) {
    e.preventDefault();

    let leadId = $(this).data('id');
    let customerName = $(this).data('name');

    let fromCity = $(this).data('from-city');
    let fromState = $(this).data('from-state');
    let fromZip = $(this).data('from-zip');
    let fromCountry = $(this).data('from-country');

    let toCity = $(this).data('to-city');
    let toState = $(this).data('to-state');
    let toZip = $(this).data('to-zip');
    let toCountry = $(this).data('to-country');

    $('#lead_id').val(leadId);
    $('#customer_name').text(customerName);
    $('#pickup_location').text(`${fromZip}, ${fromState}, ${fromCity}`);
    $('#delivery_location').text(`${toZip}, ${toState}, ${toCity}`);

    let $priceInput = $('#recommended_price');
    let $priceError = $('#price-error');

    $priceInput
        .val('')
        .prop('disabled', true)
        .removeClass('error')
        .addClass('loading');

    $priceError.addClass('d-none').text('');

    // $('#recommendPriceModal').modal('show');

    $.ajax({
        url: "{{ route('superdispatch.price-check') }}",
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            lead_id: leadId
        },
        success: function(response) {
            const price = response.recommended_price;

            if (price) {
                $priceInput
                    .text(price)
                    .prop('disabled', false)
                    .removeClass('loading error');
                $priceError.addClass('d-none').text('');
            } else {
                $priceInput
                    .text('')
                    .prop('disabled', false)
                    .removeClass('loading')
                    .addClass('error');
                $priceError
                    .removeClass('d-none')
                    .text('Error: Price not found');
            }
        },
        error: function(xhr) {
            let errorMessage = 'Error: Please check destinations';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMessage = xhr.responseJSON.error;
            }

            $priceInput
                .val('')
                .prop('disabled', false)
                .removeClass('loading')
                .addClass('error');
            $priceError
                .removeClass('d-none')
                .text(errorMessage);
        }
    });
});



$(document).on('click', '#apply-recommended-price', function () {
    let leadId = $('#lead_id').val();
    let final_price = $('#final_price').val();

    // نبحث عن صف الـ lead في الجدول بناءً على الـ lead_id
    let row = $(`.lead-id-input[value="${leadId}"]`).closest('tr');

    // نحدث قيمة السعر في حقل price داخل نفس الصف
    row.find('.price-input').val(final_price);

    // نغلق المودال
    $('#recommendPriceModal').modal('hide');
});


$(document).on('keydown', '.price', function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        var $row = $(this).closest('tr');
        var lead_id = $row.find('.lead_id').val();
        var price = $(this).val();

        $.ajax({
            url: "{{route('convert_to_quote')}}",
            type: 'post',
            data: {
                _token: "{{csrf_token()}}",
                price: price,
                lead_id: lead_id
            },
            success: function(data) {
                $row.slideUp(1500, function() {
                    $(this).remove();
                });
                toastr.success('Lead converted to Quote successfully!');
            }
        });
    }
});


$(document).ready(function () {
    $('#recommendPriceForm').on('submit', function (e) {
        e.preventDefault();

        var finalPrice = $('input[name="final_price"]').val();
        var leadId = $('input[name="lead_id"]').val();

        // نحدد الفورم الأساسي اللي فيه نفس lead_id
        var targetForm = $('input.lead-id-input[value="' + leadId + '"]').closest('form');

        if (targetForm.length) {
            // نضع السعر النهائي داخل حقل Tariff
            targetForm.find('.price-input').val(finalPrice);

            // إغلاق المودال
            $('#recommendPriceModal').modal('hide');
        }
    });
});

</script>
@endsection
