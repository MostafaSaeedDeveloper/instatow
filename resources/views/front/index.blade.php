@extends('front.master')

@section('content')

  <!-- Banner Section -->
  <section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme default-dots-two disable-navs">
      <!-- Slide Item -->
      <div class="slide-item">
        <div class="bg bg-image" style="background-image: url({{asset('images/slide-bg.jpg')}});"></div>
        <div class="bg-shape-1" style="background-image: url({{asset('images/shape2.png')}});"></div>
        <div class="bg-shape-2" style="background-image: url({{asset('front/images/banner/shape2.png')}});"></div>
        <div class="auto-container">
          <div class="row" style="flex-wrap: nowrap">
            <!-- Content Column -->
            <div class="content-column col-xl-6 col-lg-12">
              <div class="inner-column">
                <div class="content-box">
                  <h1 class="title animate-1">Instant, Safe, and Hassle-Free </h1>
                  <div class="text animate-2">Shipping vehicles of all types across all 50 states. Save up to 46% with Movewheels
                  </div>
                  <div class="btn-box animate-3">
                    <a href="{{route('place_order')}}" class="theme-btn btn-style-one"><span class="btn-title">Get Started</span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Image Column -->
            <div class="image-column col-lg-6" style="width:77%">
              <div class="inner-column">
                <figure class="image animate-2"><img src="{{asset('images/slide-object.png')}}" alt="Image"/></figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner Section -->

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
              <h2 class="words-slide-up text-split"><span class="color">Weclome to InstaTow: </span><br>Fast, Reliable, Nationwide Vehicle Shipping</h2>
              <div class="text">
                At InstaTow, we specialize in hassle-free vehicle shipping across all states in the US. Whether you're relocating, buying or selling a vehicle, or need a reliable way to transport your car, motorcycle or any other vehicle you have, we've got you covered. Our dedicated team ensures your vehicle is handled with the utmost care, providing a secure and timely delivery experience every time. With a nationwide reach, we make shipping your vehicle easy, efficient, and stress-free. Trust InstaTow for all your vehicle transportation needs—across town or across the country.</b>
</div>
<div class="btn-box">
    <a href="{{route('about')}}" class="theme-btn btn-style-one"><span class="btn-title">Read More</span></a>
  </div>
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

  </section>
  <!-- End About-Section -->


  <!-- Services Section -->
  {{-- <section class="services-section pt-0">
    <div class="auto-container">
      <div class="outer-box">
        <div class="service-carousel owl-carousel owl-theme default-dots-two">

          <!-- Service Block -->
          <div class="service-block">
            <div class="inner-box">
              <figure class="image"><img src="images/resource/service1-1.jpg" alt="Image"/></figure>
              <div class="content-box">
                <i class="icon flaticon-air-freight"></i>
                <h4 class="title"><a href="page-service-details.html">Air Freight <br/>Services</a></h4>
                <div class="text">Our global logistics expertise, advanced supply chain technology & customized logistics solutions</div>
                <a href="page-service-details.html" class="read-more">Read More <i class="flaticon-arrow-pointing-to-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Service Block -->
          <div class="service-block">
            <div class="inner-box">
              <figure class="image"><img src="images/resource/service1-2.jpg" alt="Image"/></figure>
              <div class="content-box">
                <i class="icon flaticon-ship"></i>
                <h4 class="title"><a href="page-service-details.html">Ocean Freight <br/>Services</a></h4>
                <div class="text">Our global logistics expertise, advanced supply chain technology & customized logistics solutions</div>
                <a href="page-service-details.html" class="read-more">Read More <i class="flaticon-arrow-pointing-to-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Service Block -->
          <div class="service-block">
            <div class="inner-box">
              <figure class="image"><img src="images/resource/service1-2.jpg" alt="Image"/></figure>
              <div class="content-box">
                <i class="icon flaticon-truck"></i>
                <h4 class="title"><a href="page-service-details.html">Road Freight <br/>Services</a></h4>
                <div class="text">Our global logistics expertise, advanced supply chain technology & customized logistics solutions</div>
                <a href="page-service-details.html" class="read-more">Read More <i class="flaticon-arrow-pointing-to-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Service Block -->
          <div class="service-block">
            <div class="inner-box">
              <figure class="image"><img src="images/resource/service1-1.jpg" alt="Image"/></figure>
              <div class="content-box">
                <i class="icon flaticon-air-freight"></i>
                <h4 class="title"><a href="page-service-details.html">Air Freight <br/>Services</a></h4>
                <div class="text">Our global logistics expertise, advanced supply chain technology & customized logistics solutions</div>
                <a href="page-service-details.html" class="read-more">Read More <i class="flaticon-arrow-pointing-to-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- End blog-section -->

  <!-- Tracking Section -->
  {{-- <section class="tracking-section pt-0">
    <div class="auto-container">
      <div class="outer-box">
        <div class="bg bg-image" style="background-image: url(images/background/6.jpg);"></div>
        <div class="row">
          <!-- content-column -->
          <div class="content-column col-lg-6 wow fadeInLeft">
            <div class="inner-column">
              <div class="sec-title light">
                <h2 class="words-slide-up text-split">Track Your Order</h2>
                <div class="text">Get everything you need to know to track your parcel here</div>
              </div>
              <div class="subscribe-form">
                <form method="post" action="#">
                  <div class="form-group">
                    <input type="email" name="email" class="email" placeholder="Enter your track id." required=""/>
                    <button type="button" class="theme-btn btn-style-one"><span class="btn-title">Track Order</span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- image-column -->
          <div class="image-column col-lg-6">
            <div class="inner-column">
              <div class="image-box">
                <figure class="image reveal"><img src="images/resource/track1-1.png" alt="Image"/></figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- End Tracking Section -->

  @include('front.sections.services')
  @include('front.sections.how')



  <!-- Testimonial Section -->
  {{-- <section class="testimonial-section">
    <div class="icon-plane-s1 bounce-y"></div>
    <div class="icon-shape bounce-y"></div>
    <div class="auto-container">
      <div class="sec-title text-center">
        <span class="sub-icon"></span>
        <span class="sub-title">Clients Reviews & Testimonials</span>
        <h2 class="words-slide-up text-split">What Client’s say about <br/>Our Services</h2>
      </div>

      <div class="slider-outer">
        <div class="testi-shape1"></div>
        <div class="testi-shape2"></div>
        <div class="swiper testimonial-content">
          <div class="swiper-wrapper">

            <!-- Testimonial Block -->
            <div class="swiper-slide">
              <!-- Testimonial Block -->
              <div class="testimonial-block">
                <div class="inner-box">
                  <div class="content">
                    <div class="icon-quote"></div>
                    <div class="text">Progressively strategize intermandated manufactured products after multidisci plinary sources. Conveniently iterate value-added systems with.</div>
                    <h3 class="name">Gayle Everton </h3>
                    <span class="designation">Co-Founder</span>
                    <figure class="image"><img src="images/resource/testi1-1.png" alt="Image"/></figure>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Block -->
            <div class="swiper-slide">
              <!-- Testimonial Block -->
              <div class="testimonial-block">
                <div class="inner-box">
                  <div class="content">
                    <div class="icon-quote"></div>
                    <div class="text">Progressively strategize intermandated manufactured products after multidisci plinary sources. Conveniently iterate value-added systems with.</div>
                    <h3 class="name">Gayle Everton </h3>
                    <span class="designation">Co-Founder</span>
                    <figure class="image"><img src="images/resource/testi1-1.png" alt="Image"/></figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"><i class="fa-regular fa-arrow-left-long fa-fw"></i></div>
          <div class="swiper-button-next"><i class="fa-regular fa-arrow-right-long fa-fw"></i></div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- End Testimonial Section -->


  <!-- News Section -->
  {{-- <section class="news-section-two">
    <div class="icon-plane-5"></div>
    <div class="auto-container">
      <div class="sec-title text-center">
        <span class="sub-icon"></span>
        <span class="sub-title">News and Updates</span>
        <h2 class="words-slide-up text-split">Recent Articles</h2>
      </div>
      <div class="row">

        <!-- News Block -->
        <div class="news-block-two col-lg-4 col-sm-6 wow fadeInUp">
          <div class="inner-box">
            <div class="image-box">
              <figure class="image">
                <a href="news-details.html">
                  <img src="images/resource/news2-1.jpg" alt="Image"/>
                  <img src="images/resource/news2-1.jpg" alt="Image"/>
                </a>
              </figure>
              <span class="date"><i class="fa-solid fa-calendar-days"></i>December 24, 2025 </span>
            </div>
            <div class="content-box">
              <h4 class="title"><a href="news-details.html">Liberalization of Transport & Logistics service</a></h4>
              <div class="text">Lorem Ipsum is simply dummy text printing and typesetting industry. Lorpsum has been the industry's standa dummy text.</div>
              <a href="news-details.html" class="read-more"><span>Read More</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- News Block -->
        <div class="news-block-two col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="200ms">
          <div class="inner-box">
            <div class="image-box">
              <figure class="image">
                <a href="news-details.html">
                  <img src="images/resource/news2-2.jpg" alt="Image"/>
                  <img src="images/resource/news2-2.jpg" alt="Image"/>
                </a>
              </figure>
              <span class="date"><i class="fa-solid fa-calendar-days"></i>December 24, 2025 </span>
            </div>
            <div class="content-box">
              <h4 class="title"><a href="news-details.html">Liberalization of Transport & Logistics service</a></h4>
              <div class="text">Lorem Ipsum is simply dummy text printing and typesetting industry. Lorpsum has been the industry's standa dummy text.</div>
              <a href="news-details.html" class="read-more"><span>Read More</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- News Block -->
        <div class="news-block-two col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="300ms">
          <div class="inner-box">
            <div class="image-box">
              <figure class="image">
                <a href="news-details.html">
                  <img src="images/resource/news2-3.jpg" alt="Image"/>
                  <img src="images/resource/news2-3.jpg" alt="Image"/>
                </a>
              </figure>
              <span class="date"><i class="fa-solid fa-calendar-days"></i>December 24, 2025 </span>
            </div>
            <div class="content-box">
              <h4 class="title"><a href="news-details.html">Liberalization of Transport & Logistics service</a></h4>
              <div class="text">Lorem Ipsum is simply dummy text printing and typesetting industry. Lorpsum has been the industry's standa dummy text.</div>
              <a href="news-details.html" class="read-more"><span>Read More</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- End News Section -->

  <!-- Clients Section -->
  {{-- <section class="clients-section pt-0">
    <div class="icon-ship"></div>
    <div class="auto-container">
      <div class="sec-title text-center">
        <span class="sub-title">happy client and sponsor</span>
        <h2 class="words-slide-up text-split">Trusted By Our 365,000 Clients</h2>
      </div>
      <!-- Sponsors Outer -->
      <div class="sponsors-outer">
        <!--clients carousel-->
        <ul class="clients-carousel owl-carousel owl-theme default-dots-two disable-navs">
          <li class="client-block">
            <a href="#" class="image">
              <img src="images/clients/1.png" alt="Image"/>
              <img src="images/clients/1-1.png" alt="Image"/>
            </a>
          </li>

          <li class="client-block">
            <a href="#" class="image">
              <img src="images/clients/2.png" alt="Image"/>
              <img src="images/clients/2-1.png" alt="Image"/>
            </a>
          </li>

          <li class="client-block">
            <a href="#" class="image">
              <img src="images/clients/3.png" alt="Image"/>
              <img src="images/clients/3-1.png" alt="Image"/>
            </a>
          </li>

          <li class="client-block">
            <a href="#" class="image">
              <img src="images/clients/4.png" alt="Image"/>
              <img src="images/clients/4-1.png" alt="Image"/>
            </a>
          </li>

          <li class="client-block">
            <a href="#" class="image">
              <img src="images/clients/1.png" alt="Image"/>
              <img src="images/clients/1-1.png" alt="Image"/>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section> --}}
  <!--End Clients Section -->

@endsection


@section('scripts')

<script>
        $(window).on("scroll", function() {
            let scrollPos = $(window).scrollTop(); // Get current scroll position
            let maxScroll = $(document).height() - $(window).height(); // Max scroll value
            let movePercent = (scrollPos / maxScroll) * 250; // Convert to percentage (0% to 70%)

            $(".icon-ship").css("transform", `translateX(${movePercent}%)`); // Move smoothly
        });
</script>

@endsection
