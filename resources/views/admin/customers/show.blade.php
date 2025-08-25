@extends('admin.master')

@section('content')
<div class="content content-boxed">
    <div class="row">
          <!-- User Info -->
          <div class="block block-rounded">
            <div class="block-content text-center">
              <div class="py-4">
                <h1 class="fs-lg mb-0">
                  {{$customer->first_name}} {{$customer->last_name}}
                </h1>
              </div>
            </div>
            <div class="block-content bg-body-light text-center  mb-4">
              <div class="row items-push text-uppercase">
                <div class="col-6 col-md-3">
                  <div class="fw-semibold text-dark mb-1">Leads</div>
                  <a class="link-fx fs-3" href="{{route('leads.index')}}?customer={{$customer->id}}">{{$customer->leads->count()}}</a>
                </div>
                <div class="col-6 col-md-3">
                  <div class="fw-semibold text-dark mb-1">Quotes</div>
                  <a class="link-fx fs-3" href="{{route('quotes.index')}}?customer={{$customer->id}}">{{$customer->quotes->count()}}</a>
                </div>
                <div class="col-6 col-md-3">
                  <div class="fw-semibold text-dark mb-1">Orders</div>
                  <a class="link-fx fs-3" href="javascript:void(0)">0</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="fw-semibold text-dark mb-1">Orders Value</div>
                    <a class="link-fx fs-3" href="javascript:void(0)">${{$customer->quotes->sum('price')}}</a>
                  </div>
              </div>
            </div>
          </div>
          <!-- END User Info -->

          <form action="{{route('customers.update', $customer->id)}}" method="POST">
            @method('PATCH')
            @csrf
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Customer Information </h3>
              </div>
              <div class="block-content">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="first_name" value="{{$customer->first_name}}">
                              <label class="form-label" for="example-select-floating">First Name</label>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="last_name" value="{{$customer->last_name}}">
                              <label class="form-label" for="example-select-floating">Last Name</label>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="email" name="email" value="{{$customer->email}}">
                              <label class="form-label" for="example-select-floating">Email</label>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="phone" value="{{$customer->phone}}">
                              <label class="form-label" for="example-select-floating">Phone</label>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="phone2" value="{{$customer->phone2}}">
                              <label class="form-label" for="example-select-floating">Phone2</label>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="cellphone" value="{{$customer->cellphone}}">
                              <label class="form-label" for="example-select-floating">Cellphone</label>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-floating mb-4">
                              <input class="form-control city" type="text" name="city" value="{{$customer->city}}">
                              <label class="form-label" for="example-select-floating">City</label>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-floating mb-4">
                              <select class="js-select2 form-select state" id="example-select2" name="state" style="width: 100%;" data-placeholder="Choose one..">
                                  <option>Select State</option>
                                  @foreach ($states as $state)
                                  <option {{$customer->state == $state->iso2 ? 'selected' : ''}} value="{{$state->iso2}}">{{$state->name}}</option>
                                  @endforeach
                                </select>
                              <label class="form-label" for="example-select-floating">State</label>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-floating mb-4">
                              <input class="form-control zip" type="text" name="zip" value="{{$customer->zip}}">
                              <label class="form-label" for="example-select-floating">Zip</label>
                              <ul class="zip-autocomplete"></ul>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-floating mb-4">
                              <select class="form-select" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example">
                                  <option value="United Status" selected>United Status</option>
                                </select>
                           <label class="form-label" for="example-select-floating">Country</label>
                            </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-floating mb-4">
                              <input class="form-control" type="text" name="address_1" value="{{$customer->address_1}}">
                              <input class="form-control" type="text" name="address_2" value="{{$customer->address_2}}">
                              <label class="form-label" for="example-select-floating">Address</label>
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input class="form-control" type="text" name="username" value="{{$customer->username}}">
                            <label class="form-label" for="example-select-floating">Username</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input class="form-control" type="text" name="password">
                            <label class="form-label" for="example-select-floating">Passowrd</label>
                            <small>if you don't change the password leave it blank</small>
                          </div>
                    </div>
                  </div>

              </div>

            </div>
            <button class="btn btn-primary">Save Changes</button>

          </div>
        </form>
    </div>
</div>
@endsection
