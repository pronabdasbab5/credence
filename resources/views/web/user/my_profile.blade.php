@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>MY ACCOUNT</h1>
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
								<li><span>	My Account</span></li>
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
							<h2 class="login-title">my account</h2>
							@if(session()->has('msg'))
								<p>{{ session()->get('msg') }}</p>
							@endif
							<form action="{{ route('web.update_my_profile') }}" autocomplete="off" method="POST">
								@csrf
								<label>Name</label>
								<input type="text" name="name" value="{{ $my_account->name }}" required />
								@error('name')
	                                {{ $message }}
	                            @enderror
								<label>Email</label>
								<input type="email" name="email" value="{{ $my_account->email }}" required />
								@error('email')
	                                {{ $message }}
	                            @enderror
								<label>Mobile No</label>
								<input type="number" min="0" name="mobile_no" value="{{ $my_account->contact_no }}" required />
								@error('mobile_no')
	                                {{ $message }}
	                            @enderror
								<input class="login-sub" type="submit" value="update" />
							</form>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
		<!-- login-area end -->
@endsection
