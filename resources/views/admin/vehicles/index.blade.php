@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content content-full">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Vehicles</h3>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table id="vehiclesTable" class="table table-bordered table-striped table-vcenter text-center">
              <thead>
                <tr>
                  <th class="text-center" style="width: 60px;">#
                  </th>
                  <th>Year</th>
                  <th>Make</th>
                  <th>Model</th>
                  <th>Entry Serial</th>
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
    $('#vehiclesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('datatable.vehicles') }}",
            data: function(d) {
            let urlParams = new URLSearchParams(window.location.search);
            d.customer = urlParams.get('customer'); // Append customer parameter
        }
        },
        columns: [
            { data: 'id'},
            { data: 'year'},
            { data: 'make'},
            { data: 'model'},
            { data: 'entry_serial'},
            { data: 'actions'},
        ],
    });
});

</script>
@endsection
