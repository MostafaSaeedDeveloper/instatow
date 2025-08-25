
  <!-- Process Section -->
  <section class="process-section pt-50">
    {{-- <div class="bg bg-image" style="background-image: url(images/background/9.jpg);"></div> --}}
    {{-- <div class="icon-bus"></div> --}}
    <div class="auto-container">
      <div class="sec-title text-center">
        <span class="sub-icon"></span>
        <span class="sub-title">InstaTow Platform</span>
        <h2 class="words-slide-up text-split">How it Works ?</h2>
      </div>
      <div class="outer-box">
        <div class="icon-line"></div>
        <div class="row">

          <!-- Process Block -->
          <div class="process-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
            <div class="inner-box">
              <div class="icon-box">
                <figure class="image"><img src="{{asset('front/images/resource/process1-1.png')}}" alt="Image"/></figure>
                <span class="count">1</span>
              </div>
              <div class="content-box">
                <h6 class="title">Place Your Order</h6>
                <div class="text">Enter your shipment details and select a convenient pickup date for a seamless towing experience.</div>
              </div>
            </div>
          </div>

          <!-- Process Block -->
          <div class="process-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
            <div class="inner-box">
              <div class="icon-box">
                <figure class="image"><img style="height: 80px" src="{{asset('images/proccess1.png')}}" alt="Image"/></figure>
                <span class="count">2</span>
              </div>
              <div class="content-box">
                <h6 class="title">Get Your Quote & Approve It</h6>
                <div class="text">Receive a detailed quote outlining the entire process. Approve it or make your own offer, and we’ll handle the rest!</div>
              </div>
            </div>
          </div>

          <!-- Process Block -->
          <div class="process-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
            <div class="inner-box">
              <div class="icon-box">
                <figure class="image"><img style="height: 80px" src="{{asset('images/proccess2.png')}}" alt="Image"/></figure>
                <span class="count">3</span>
              </div>
              <div class="content-box">
                <h6 class="title">Make a Deposit Payment</h6>
                <div class="text">A deposit is only required after your vehicle is picked up—ensuring a secure and transparent process.</div>
              </div>
            </div>
          </div>

          <!-- Process Block -->
          <div class="process-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="900ms">
            <div class="inner-box">
              <div class="icon-box">
                <figure class="image"><img src="{{asset('front/images/resource/process1-4.png')}}" alt="Image"/></figure>
                <span class="count">4</span>
              </div>
              <div class="content-box">
                <h6 class="title">Track Your Order</h6>
                <div class="text">Stay updated with real-time tracking from pickup to delivery, so you know exactly where your vehicle is every step of the way.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="btn-box">
          <a href="{{route('place_order_page')}}" class="theme-btn btn-style-one"><span class="btn-title">Get a Quote</span></a>
          <a href="tel:1234567890" class="contact-btn"><i class="fa-solid fa-phone-volume"></i>+01 (2345) 67890</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Process Section -->
