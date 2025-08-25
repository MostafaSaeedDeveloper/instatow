@extends('front.master')

@section('content')

	<!-- Start main-content -->
	<section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">How it works ?</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{route('front_page')}}">Home</a></li>
					<li>How it works ?</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->

    @include('front.sections.how')
@endsection
