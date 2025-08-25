@extends('front.place-order.master')

@section('order-content')
<div class="content-box">
    <div class="row">
        <div class="col-md-6">
            {{-- <span class="sub-title">We Create Opportunity to Reach Potential</span> --}}
            <h2 class="title words-slide-up text-split">Request a Quote</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="theme-btn btn-style-one" href="{{url()->previous()}}">Return <i class="fa fa-undo"></i></a>
        </div>
    </div>

  </div>

<form id="wizard-form" action="{{route('place_order')}}" method="POST">
    @csrf
    <!-- Step 1 -->
    <div class="step" id="step-1">
        <h4>Tell us more about your Vehicle</h4>

        <div class="row">
        <div class="col-md-4 col-sm-4 form-group">
            <select id="year" name="year" class="select2 w-100">
              <option value="">Select Year</option>
              @foreach($years as $year)
              <option value="{{ $year->id }}">{{ $year->year }}</option>
          @endforeach
            </select>
          </div>
        <div class="col-md-4 col-sm-4 form-group">
            <select name="make" id="make" class="select2 w-100" placeholder="" disabled required>
                <option value="">Select year first</option>
            </select>
          </div>
        <div class="col-md-4 col-sm-4 form-group">
            <select name="model" id="model" class="select2 w-100" disabled required>
                <option value="">Select make first</option>
              </select>
          </div>
          <div class="col-md-4 col-sm-4 form-radio-inline">
            <label for="doesrun">Does it run? </label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="run" id="inlineRadio1" value="1" checked>
              <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="run" id="inlineRadio2" value="0">
              <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
          </div>
          <br><br>
        </div>

        <div class="action-buttons">
        <button type="button" class="btn btn-primary next-btn" data-next="step-2">Continue to Step 2</button>
        </div>
    </div>

    <!-- Step 2 -->
    <div class="step" id="step-2" style="display: none;">
        <h4>Step 2: Address Information</h4>
        <div class="row">
            <div class="col-md-4 col-sm-4 form-group">
                <label for="origin">Origin</label>
                <input type="text" class="form-control" id="origin" name="origin" required>
                <ul id="origin-autocomplete"></ul>
              </div>
              <div class="col-md-4 col-sm-4 form-group">
                <label for="origin">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" required>
                <ul id="destination-autocomplete"></ul>
              </div>
              <div class="col-md-12 col-sm-12 form-radio-inline">
                <label for="doesrun">When it’s ready to be picked up? </label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pickup" id="pickup1" value="I’m Flexible">
                  <label class="form-check-label" for="pickup1">I’m Flexible</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pickup" id="pickup2" value="ASAP">
                  <label class="form-check-label" for="pickup2">ASAP</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pickup" id="pickup3" value="Specific date">
                  <label class="form-check-label" for="pickup3">Specific date</label><br>
                </div>
              </div>
              <div class="col-md-4 col-sm-4" id="specific_date" style="display: none">
                <input type="date" name="specific_date" class="form-control">
              </div>
        </div>

        <input type="hidden" name="type" value="{{$type}}">

        @if (auth('customer')->check())
        <input type="hidden" name="customer_id" value="{{auth('customer')->user()->id}}">
        <button type="button" class="btn btn-secondary prev-btn" data-prev="step-2">Previous</button>
        <button type="submit" class="btn btn-success">Submit</button>
        @else
        <div class="action-buttons">
            <button type="button" class="btn btn-secondary prev-btn" data-prev="step-1">Previous</button>
            <button type="button" class="btn btn-primary next-btn" data-next="step-3">Next</button>
        </div>
        @endif
    </div>
    @if (!auth('customer')->check())
    <!-- Step 3 -->
    <div class="step" id="step-3" style="display: none;margin-top:-35px">

        <h4>Step 3: Create Your Account</h4>
        <div class="row">
        <div class="col-md-3 col-sm-4 form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
          </div>
        <div class="col-md-3 col-sm-4 form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
          </div>
        <div class="col-md-3 col-sm-4 form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
        <div class="col-md-3 col-sm-4 form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="col-md-6 col-sm-6 form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="username" required>
          </div>
        <div class="col-md-6 col-sm-6 form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>


          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="accept" id="accept" value="accept" required>
            <label class="form-check-label" for="accept">By sending this form you allow us to contact you by email, SMS, or a phone call regarding your quote</label>
          </div>
        </div>
        <div class="action-buttons">
        <button type="button" class="btn btn-secondary prev-btn" data-prev="step-2">Previous</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    @endif
</form>

@endsection
