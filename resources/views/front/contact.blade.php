@extends('front.master')

@section('content')
	<!-- Start main-content -->
	<section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">Contact Us</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{route('front_page')}}">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->



    <!--Contact Details Start-->
    <section class="contact-details">
        <div class="container pb-70">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">Send us email</span>
                        <h2>Feel free to write</h2>
                    </div>
                    <!-- Contact Form -->
                    <form id="contact_form" name="contact_form" class="" action="" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_name" class="form-control" type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="mb-5">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
                            <button type="reset" class="theme-btn btn-style-one ml-25"><span class="btn-title">Reset</span></button>
                        </div>
                    </form>
                    <!-- Contact Form Validation-->
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">Need any help?</span>
                            <h2>Get in touch with us</h2>
                            <div class="text">Lorem ipsum is simply free text available dolor sit amet consectetur notted adipisicing elit sed do eiusmod tempor incididunt simply dolore magna.</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-phone-plus"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Have any question?</h6>
                                    <a href="tel:980089850"><span>Free</span> +92 (020)-9850</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-envelope1"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Write email</h6>
                                    <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#c1afa4a4a5a9a4adb181a2aeacb1a0afb8efa2aeac"><span class="__cf_email__" data-cfemail="a4cac1c1c0ccc1c8d4e4c7cbc9d4c5cadd8ac7cbc9">[email&#160;protected]</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-location"></span>
                                </div>
                                <div class="text">
                                    <h6 class="mb-1">Visit anytime</h6>
                                    <span>66 broklyn golden street. New York</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Details End-->

    <!-- Map Section-->
    <section class="map-section py-0">
        <iframe  class="map w-100"  src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </section>
    <!--End Map Section-->

@endsection
