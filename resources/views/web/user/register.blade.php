@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>REGISTER PAGE</h1>
							<p>We are a featured brand that calls itself fashion</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page-title-area end -->
		<!-- breadcrumb-area start -->
		<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-list">
							<ul>
								<li><a href="{{ url('/') }}">HOME</a></li>
								<li><span>	Register Page</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<!-- login-area start -->
		<div class="login-area">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="login-content login-margin">
							<h2 class="login-title">create a new account</h2>
							@if(session()->has('msg'))
								<p>{{ session()->get('msg') }}</p>
							@endif
							<form action="{{ url('register') }}" autocomplete="off" method="POST">
								@csrf
								<label>Name</label>
								<input type="text" name="name" value="{{ old('name') }}" required />
								@error('name')
	                                {{ $message }}
	                            @enderror
								<label>Email</label>
								<input type="email" name="email" value="{{ old('email') }}" required />
								@error('email')
	                                {{ $message }}
	                            @enderror
								<label>Mobile No</label>
								<input type="number" min="0" name="mobile_no" value="{{ old('mobile_no') }}" required />
								@error('mobile_no')
	                                {{ $message }}
	                            @enderror
								<label>Password</label>
								<input type="password" name="pass" value="{{ old('pass') }}" required />
								@error('pass')
	                                {{ $message }}
	                            @enderror
								<input class="login-sub" type="submit" value="sign up" />
								<a href="{{ route('web.login') }}" class="login-link">Already Customer? Login Here</a>
							</form>
							<div class="sign-up-today">
								<h2 class="login-title">sign up today and you'll be able to:</h2>
								<ul>
									<li>
										<span>
											<i class="fa fa-check-square-o"></i>
											<span>speed your way through the checkout</span>
										</span>
									</li>
									<li>
										<span>
											<i class="fa fa-check-square-o"></i>
											<span>track your order easily</span>
										</span>
									</li>
									<li>
										<span>
											<i class="fa fa-check-square-o"></i>
											<span>keep a record of your all purchase</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
		<!-- login-area end -->
@endsection
