@extends('front.master')

@section('content')

	<!-- Start main-content -->
	<section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">About Us</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{route('front_page')}}">Home</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->

  <!-- About Section -->
  <section class="about-section">
    <div class="icon-ship" style="width:100%"></div>
    <div class="icon-shape bounce-y"></div>
    <div class="auto-container">
      <div class="row">
        <!-- Content Column -->
        <div class="content-column col-lg-7 col-md-12 col-sm-12 order-lg-2 wow fadeInRight">
          <div class="inner-column">
            <div class="sec-title">
              <span class="sub-title">Who We Are</span>
              <h2 class="words-slide-up text-split"><span class="color">InstaTow: </span>Fast, Reliable, Nationwide Vehicle Shipping</h2>
              <div class="text">
                At InstaTow, we specialize in hassle-free vehicle shipping across all states in the US. Whether you're relocating, buying or selling a vehicle, or need a reliable way to transport your car, motorcycle or any other vehicle you have, we've got you covered. Our dedicated team ensures your vehicle is handled with the utmost care, providing a secure and timely delivery experience every time. With a nationwide reach, we make shipping your vehicle easy, efficient, and stress-free. Trust InstaTow for all your vehicle transportation needs—across town or across the country.</div>
            </div>
          </div>
        </div>

        <!-- image-column -->
        <div class="image-column col-lg-5 col-md-12 col-sm-12">
          <div class="inner-column">
            <div class="image-box">
              <figure class="image overlay-anim reveal"><img src="{{asset('images/InstaTwoArtboard 3 copy_2.jpg')}}" alt="Image" /></figure>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="auto-container">
      <div class="row" style="flex-direction: row-reverse;">
        <div class="content-column style-two col-lg-7 col-md-12 col-sm-12 order-lg-2 wow fadeInRight" data-wow-delay="300ms">
          <div class="inner-column" style="padding-left: 0px">
            <div class="row">
              <!-- About Block -->
              After years of hands-on experience in vehicle hauling and market analysis, we identified a major gap in the logistics industry. Customers struggle to connect directly with reliable drivers at fair prices, often paying extra for services they don’t actually receive. Our mission is to bridge this gap by providing a transparent, efficient, and cost-effective solution.
              That’s why we launched INSTATOW—a dedicated logistics solution designed to bridge this gap by connecting customers directly with reliable, insured drivers.
              Whether you need to transport cars, motorcycles, RVs, or any other vehicle, INSTATOW ensures a hassle-free experience. Say goodbye to past frustrations and enjoy a seamless, secure, Efficient  and stress-free towing service that makes your life easier and safer.
            </div>

          </div>
        </div>

        <!-- image-column -->
        <div class="image-column style-two col-lg-5 col-md-12 col-sm-12">
          <div class="inner-column">
            <div class="image-box">
              <figure class="image overlay-anim reveal"><img src="{{asset('images/sag.png')}}" alt="Image"/></figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About-Section -->

  @include('front.sections.why')
    <!-- Call To Action -->
    <section class="call-to-action pt-3">
        <div class="icon-man" style="background-image: url({{asset('images/tow1.png')}});background-size:contain;background-repeat:no-repeat;height:225px"></div>
        <div class="icon-plane-4 bounce-y"></div>
        <div class="icon-arrow"></div>
        <div class="auto-container">
          <div class="outer-box">
            <div class="bg bg-pattern-1" style="background: #e2e2e2;"></div>
            <div class="content-box">
              <h2 class="title words-slide-up text-split">24/7 customer support any time of the day or night</h2>
              <div class="text">customers can get help and find answers to questions as soon</div>
              <div class="btn-box">
                <a href="{{route('place_order_page')}}" class="theme-btn btn-style-one"><span class="btn-title">Request a Quote</span></a>
                <a href="{{route('contact')}}" class="theme-btn btn-style-one light-bg"><span class="btn-title">Contact Us</span></a>
              </div>
            </div>

            <div class="image-box">
              <figure class="image reveal"><img style="height: 270px" src="{{asset('images/tow2.png')}}" alt="Image"></figure>
            </div>
          </div>
        </div>
      </section>
      <!-- End Call To Action -->

@endsection
