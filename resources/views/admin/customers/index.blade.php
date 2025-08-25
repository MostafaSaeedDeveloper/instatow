@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Customers</h3>
          <div class="block-options">
            <a class="btn btn-primary my-2" href="{{route('customers.create')}}">
                <i class="fa fa-fw fa-plus opacity-50"></i>
                <span class="d-none d-sm-inline ms-1">Create Customer</span>
              </a>
          </div>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter text-center">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">#
                  </th>
                  <th style="width: 30%;">Name</th>
                  <th style="width: 25%;">Phone</th>
                  <th style="width: 25%;">Email</th>
                  <th class="text-center" style="width: 120px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->email}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('customers.show', $customer->id)}}" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Edit">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form class="delete_form" action="{{route('customers.destroy', $customer->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="btn btn-sm btn-alt-danger delete-btn" data-bs-toggle="tooltip" title="Delete">
                                  <i class="fa fa-times"></i>
                                </button>
                            </form>
                              </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END Full Table -->

    </div>
    <!-- END Page Content -->

@endsection
