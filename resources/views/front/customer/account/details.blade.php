@extends('front.customer.account.master')

@section('dashboard-content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<form action="{{route('updateCustomer')}}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12 col-sm-12 form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{auth('customer')->user()->name}}" required>
      </div>
    <div class="col-md-12 col-sm-12 form-group">
        <label for="name">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{auth('customer')->user()->email}}" required>
      </div>
    <div class="col-md-12 col-sm-12 form-group">
        <label for="name">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{auth('customer')->user()->phone}}" required>
      </div>
      <div class="col-md-12 col-sm-12 form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" id="name" name="username" value="{{auth('customer')->user()->username}}" disabled>
      </div>
    <div class="col-md-12 col-sm-12 form-group">
        <label for="name">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <small>if you don't want change password leave it blank</small>
      </div>
    </div>

    <div class="col-md-12 mt-3">
        <input type="hidden" name="customer_id" value="{{auth('customer')->user()->id}}">
        <button type="submit" class="btn btn-block btn-success">Update Profile</button>
    </div>

</form>
@endsection
