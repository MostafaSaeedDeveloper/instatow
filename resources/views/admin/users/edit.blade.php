@extends('admin.master')

@section('content')
<div class="content content-full content-boxed">
    <!-- New Post -->
    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
      <div class="block">
        <div class="block-header block-header-default">
          <a class="btn btn-alt-secondary" href="{{route('users.index')}}">
            <i class="fa fa-arrow-left me-1"></i> Manage Users
          </a>
          <div class="block-options">

          </div>
        </div>
        <div class="block-content">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <div class="row justify-content-center push">
            <div class="col-md-10">
              <div class="mb-4">
                <label class="form-label" for="dm-post-add-title">Name</label>
                <input type="text" class="form-control" id="dm-post-add-title" name="name" value="{{$user->name}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-post-add-title">Email</label>
                <input type="email" class="form-control" id="dm-post-add-title" name="email" value="{{$user->email}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-post-add-title">Phone</label>
                <input type="text" class="form-control" id="dm-post-add-title" name="phone" value="{{$user->phone}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="example-select">Role</label>
                <select class="form-select" id="example-select" name="role" placeholde="Choose Role">
                  @foreach ($roles as $role)
                    <option {{$user->roles->first()->name == $role->name ? 'selected' : ''}} value="{{$role->name}}">{{$role->display_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-post-add-title">Username</label>
                <input type="text" class="form-control" id="dm-post-add-title" name="username" value="{{$user->username}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-post-add-title">Password</label>
                <input type="password" class="form-control" id="dm-post-add-title" name="password">
              </div>

            </div>
          </div>
        </div>
        <div class="block-content bg-body-light">
          <div class="row justify-content-center push">
            <div class="col-md-10">
              <button type="submit" class="btn btn-alt-primary">
                <i class="fa fa-fw fa-check opacity-50 me-1"></i> Update User
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END New Post -->
  </div>
@endsection
