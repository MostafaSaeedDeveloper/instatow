@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content content-full">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Orders</h3>
          <div class="block-options">
            <a class="btn btn-primary my-2" href="{{route('orders.create')}}">
                <i class="fa fa-fw fa-plus opacity-50"></i>
                <span class="d-none d-sm-inline ms-1">Create Order</span>
              </a>
          </div>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table id="ordersTable" class="table table-bordered table-striped table-vcenter text-center">
              <thead>
                <tr>
                  <th class="text-center" style="width: 60px;">#
                  </th>
                  <th>Customer</th>
                  <th>Vehicle</th>
                  <th>Type</th>
                  <th>Orig</th>
                  <th>Dest</th>
                  {{-- <th style="width: 100px">1st Avail</th> --}}
                  <th>Tariff</th>
                  <th>Carrier Pay</th>
                  <th>Status</th>
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
    $('#ordersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('datatable.orders') }}",
            data: function(d) {
            let urlParams = new URLSearchParams(window.location.search);
            d.customer = urlParams.get('customer'); // Append customer parameter
        }
        },
        columns: [
            { data: 'id'},
            { data: 'customer'},
            { data: 'vehicle'},
            { data: 'type'},
            { data: 'orig'},
            { data: 'dest'},
            // { data: 'estship'},
            { data: 'tariff'},
            { data: 'carrier_pay'},
            { data: 'status'},
            { data: 'actions'},
        ],
    });
});


// $(document).on('keyup', '.price', function() {
//     var lead_id = $(this).closest('tr').find('.lead_id').val();
//     var price = $(this).val();
//     $.ajax({
//         url: "{{route('convert_to_quote')}}",
//         type: 'post',
//         data: {
//             _token: "{{csrf_token()}}",
//             price: price,
//             lead_id: lead_id
//         },
//         success: function(data) {
//             console.log(data);
//         }
//     });
// });
</script>
@endsection
