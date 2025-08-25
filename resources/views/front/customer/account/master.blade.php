@extends('front.master')

@section('content')

	<!-- Start main-content -->
	<section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">My Account</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{route('front_page')}}">Home</a></li>
					<li>My Account</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->


    <!--Start Services Details-->
    <section class="services-details">
        <div class="container">
            <div class="row">
                <!--Start Services Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">
                        <!--Start Services Details Sidebar Single-->
                        <div class="sidebar-widget service-sidebar-single">

                            {{-- <div class="customer-information text-center">
                                <h2>{{auth('customer')->user()->name}}</h2>
                                <small >{{auth('customer')->user()->phone}}</small>
                            </div> --}}

                            <div class="sidebar-service-list">
                                <ul>
                                    <li {{request()->is('customer/account') ? "class=current" : ''}}><a href="{{route('customer_account')}}"><i class="fas fa-angle-right"></i><span>Dashboard</span></a></li>
                                    <li {{request()->is('customer/account/orders') ? "class=current" : ''}}><a href="{{route('customer_orders')}}"><i class="fas fa-angle-right"></i><span>My Orders</span></a></li>
                                    <li {{request()->is('customer/account/details') ? "class=current" : ''}}><a href="{{route('account_details')}}"><i class="fas fa-angle-right"></i><span>Account Details</span></a></li>
                                    <li {{request()->is('customer/logout') ? "class=current" : ''}}><a href="{{route('customer_logout')}}"><i class="fas fa-angle-right"></i><span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Services Details Sidebar-->
                    </div>
                </div>

                <!--Start Services Details Content-->
                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                       @yield('dashboard-content')
                </div>
                <!--End Services Details Content-->
            </div>
        </div>
    </section>
    <!--End Services Details-->

 @endsection
