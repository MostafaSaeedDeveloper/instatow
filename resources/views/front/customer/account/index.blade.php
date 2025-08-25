@extends('front.customer.account.master')

@section('dashboard-content')
<div class="dashboard-content">
    <h2>Welcome back, {{auth('customer')->user()->name}}!</h2>
    <p>Here you can view your recent activity, check your orders, and manage your account.</p>


    <div class="service-details-help">
        <div class="help-shape-1"></div>
        <div class="help-shape-2"></div>
        <h2 class="help-title">Contact with  us</h2>
        <div class="help-icon">
            <span class=" lnr-icon-phone-handset"></span>
        </div>
        <div class="help-contact">
            <p>Need help? Talk to an expert</p>
            <a href="tel:12463330079">+892 ( 123 ) 112 - 9999</a>
        </div>
    </div>

</div>

@endsection
