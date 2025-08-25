@extends('front.master')


@section('content')

{{-- <section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Place Order</h1>
        </div>
    </div>
</section> --}}

<style>
    header.main-header.header-style-one, .footer-style-one{
        display: none;
    }
</style>

<section class="faqs-section" style="padding-top: 100px;height:100vh">
    <div class="bg bg-image" style="background-image: url({{asset('images/footer-bg')}});"></div>
    <div class="icon-container-4" style="background-image: url({{asset('images/slide-object2.png')}}); background-size: contain;background-repeat: no-repeat;"></div>
    <div class="icon-arrow-3"></div>
		<div class="auto-container">
			<div class="row">

        <!-- Form Column -->
        <div class="form-column col-lg-12 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="300ms">
          <div class="inner-column">
            <!-- Contact Form -->
            <div class="contact-form">
              <div class="content-box">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <span class="sub-title">We Create Opportunity to Reach Potential</span> --}}
                        <h2 class="title words-slide-up text-split">Request a Quote</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="theme-btn btn-style-one" href="{{route('front_page')}}">Return <i class="fa fa-undo"></i></a>
                    </div>
                </div>

              </div>
                        <h3 style="color:white">Thank you for Order, we will contact with you soon for quote.</h3>
                        <h5 style="color:white">Your will redirect to your account after 5 seconds</h5>
                        {{-- <a class="btn btn-secondary" href="{{route('customer_account')}}">Back to Dashboard</a> --}}
            </div>
            <!--End Contact Form -->
          </div>
        </div>
			</div>
		</div>
	</section>




@endsection


@section('scripts')

<style>
    h4 {
        color: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #ffffff;
    padding-left: 0;
}
.select2-results__option {
    padding: 0 10px;
    color: #000000;
}
.select2-container--default.select2-container--disabled .select2-selection--single {
    background-color: #545454;
    cursor: default;
}
label {
    font-size: 20px;
    color: #fff;
}
.action-buttons {
    margin-top: 30px;
}
</style>



<script>
    setInterval(() => {
        window.location.href = "{{ route('customer_account') }}"; // Redirect to a specific route
    }, 5000);
</script>

@endsection
