@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content content-full">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Quotations</h3>
          <div class="block-options">
            <a class="btn btn-primary my-2" href="{{route('quotes.create')}}">
                <i class="fa fa-fw fa-plus opacity-50"></i>
                <span class="d-none d-sm-inline ms-1">Create Quote</span>
              </a>
          </div>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table id="quotesTable" class="table table-bordered table-striped table-vcenter text-center">
              <thead>
                <tr>
                  <th class="text-center" style="width: 60px;">#
                  </th>
                  <th>Customer</th>
                  <th>Agent</th>
                  <th>Vehicle</th>
                  <th>Type</th>
                  <th>Orig</th>
                  <th>Dest</th>
                  {{-- <th style="width: 100px">Est. Ship</th> --}}
                  <th>Tariff</th>
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
    $('#quotesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('datatable.quotes') }}",
            data: function(d) {
            let urlParams = new URLSearchParams(window.location.search);
            d.customer = urlParams.get('customer'); // Append customer parameter
        }
        },
        columns: [
            { data: 'id'},
            { data: 'customer'},
            { data: 'agent'},
            { data: 'vehicle'},
            { data: 'type'},
            { data: 'orig'},
            { data: 'dest'},
            // { data: 'estship'},
            { data: 'tariff'},
            { data: 'actions'},
        ],
    });
});


$(document).on('keyup', '.price', function() {
    var lead_id = $(this).closest('tr').find('.lead_id').val();
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
            console.log(data);
        }
    });
});
</script>
@endsection
