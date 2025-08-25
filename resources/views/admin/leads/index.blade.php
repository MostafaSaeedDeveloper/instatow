@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content content-full">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Leads</h3>
          <div class="block-options">
            <a class="btn btn-primary my-2" href="{{route('leads.create')}}">
                <i class="fa fa-fw fa-plus opacity-50"></i>
                <span class="d-none d-sm-inline ms-1">Create Lead</span>
              </a>
          </div>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table id="leadsTable" class="table table-bordered table-striped table-vcenter text-center">
              <thead>
                <tr>
                  <th class="text-center" style="width: 60px;">#
                  </th>
                  <th>Customer</th>
                  <th>Vehicle</th>
                  <th>Type</th>
                  <th>Orig</th>
                  <th>Dest</th>
                  <th style="width: 100px">SuperDispatch</th>
                  <th style="width:100px">Tariff</th>
                  <th class="text-center" style="width: 120px;">Actions</th>
                </tr>
              </thead>

            </table>
          </div>
        </div>
      </div>
      <!-- END Full Table -->

    </div>
    <!-- END Page Content -->



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
