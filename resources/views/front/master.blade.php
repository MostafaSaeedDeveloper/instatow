<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>InstaTow</title>
<!-- Stylesheets -->
<link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
<link href="{{asset('front/css/custom.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="{{asset('images/Logo.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('images/Logo.png')}}" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<style>
    .icon-ship {
        background-image: url('{{asset('images/slide-object2.png')}}');
        background-size: contain;
        background-repeat: no-repeat;
    }
</style>

<body>

<div class="page-wrapper">

  <!-- Preloader -->
  <div class="preloader"><span class="loader"><img src="{{asset('images/Logo.png')}}" alt=""></span></div>

  @include('front.layouts.header')

    @yield('content')

@include('front.layouts.footer')

</div><!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('front/js/wow.js')}}"></script>
<script src="{{asset('front/js/appear.js')}}"></script>
<script src="{{asset('front/js/jquery-ui.js')}}"></script>
<script src="{{asset('front/js/select2.min.js')}}"></script>
<script src="{{asset('front/js/gsap.min.js')}}"></script>
<script src="{{asset('front/js/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('front/js/splitType.js')}}"></script>
<script src="{{asset('front/js/swipper.min.js')}}"></script>
<script src="{{asset('front/js/owl.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>


<script>
    $('.select2').select2();
    $(document).ready(function() {
    // Set up jQuery AJAX to send CSRF token with each request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

        $(window).on("scroll", function() {
            let scrollPos = $(window).scrollTop(); // Get current scroll position
            let maxScroll = $(document).height() - $(window).height(); // Max scroll value
            let movePercent = (scrollPos / maxScroll) * 250; // Convert to percentage (0% to 70%)

            $(".icon-ship").css("transform", `translateX(${movePercent}%)`); // Move smoothly
        });
</script>
</body>
@yield('scripts')

</html>
