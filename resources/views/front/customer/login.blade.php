@extends('front.master')
@section('content')

	<!-- Start main-content -->
	<section class="page-title" style="background-image: url({{asset('images/slide-bg.jpg')}});">
		<div class="auto-container">
			<div class="title-outer text-center">
				<h1 class="title">My Account</h1>
				<ul class="page-breadcrumb">
					<li><a href="{{route('front_page')}}">Home</a></li>
					<li>Customer Login</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- end main-content -->


    <section class="container login pt-40 text-center">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-md-4 offset-md-8 mx-auto">
                <form class="form" action="{{route('customer_login')}}" method="POST">
                    @csrf
                    <div class="mb-10">
                      <input type="text" class="form-control" name="username" placeholder="Username" value="">
                    </div>
                    <div class="mb-10">
                      <input type="password" class="form-control" name="password" placeholder="Password" value="">
                    </div>
                    <div class="mb-30">
                      <button type="submit" class="theme-btn btn-style-one mt-3" style="width:100%"><span class="btn-title">Login</span></button>
                    </div>
                  </form>
            </div>

        </div>

    </section>

@endsection
