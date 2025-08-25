@extends('admin.master')


@section('content')

    <!-- Page Content -->
    <div class="content">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Users</h3>
          <div class="block-options">
            <a class="btn btn-primary my-2" href="{{route('users.create')}}">
                <i class="fa fa-fw fa-plus opacity-50"></i>
                <span class="d-none d-sm-inline ms-1">Create User</span>
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
                  <th style="width: 25%;">Username</th>
                  <th style="width: 25%;">Email</th>
                  <th style="width: 15%;">Role</th>
                  <th class="text-center" style="width: 120px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles->first()->display_name}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-alt-primary" data-bs-toggle="tooltip" title="Edit">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form class="delete_form" action="{{route('users.destroy', $user->id)}}" method="POST">
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
