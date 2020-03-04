@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>LOGIN PAGE</h1>
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
								<li><span>	Login Page</span></li>
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
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="login-content">
							<h2 class="login-title">Login</h2>
							{{-- <div class="social-sign">
								<a href="#"><i class="fa fa-facebook"></i> Sign in with facebook</a>
								<a class="twitter" href="#"><i class="fa fa-twitter"></i> Sign in with twitter</a>
							</div> --}}
							@if (session()->has('login_error'))
			                    <p>{{ session()->get('login_error') }}</p>
			                @endif
							<form action="{{ url('login') }}" autocomplete="off" method="POST">
								@csrf
								<label>Mobile No</label>
								<input type="number" name="username" value="{{ old('username') }}" required />
								<label>Password</label>
								<input type="password" name="password" value="{{ old('password') }}" required />
								<div class="login-lost">
									<span class="forgot-login">
										<a href="#">Forgot your password?</a>
									</span>
								</div>
								<input class="login-sub" type="submit" value="Login" />
							</form>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div>
			</div>
		</div>
		<!-- login-area end -->
@endsection
