<!doctype html>
<html class="no-js" lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ciel Couture</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/img/favicon.ico') }}">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{ asset('web/css/jquery-ui.min.css') }}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{ asset('web/css/meanmenu.min.css') }}">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
		<!-- Slick slider css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/slick.css') }}" media="screen" />
		<!-- font-awesome css -->
        <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('web/style.css') }}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
		<!-- modernizr js -->
        <script src="{{ asset('web/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <script type="text/javascript">
        	var SITEURL = '';
			if(window.location.hostname == 'http://127.0.0.1:8000/'){
			   SITEURL = 'http://127.0.0.1:8000/';
			}else if(window.location.hostname == 'https://laravel.tutsmake.com'){
			   SITEURL = window.location.hostname;
			}else if(window.location.hostname == 'https://laravel.tutsmake.com'){
			   SITEURL = window.location.hostname;
			}
        </script>
    </head>
    <body>

        <!-- Add your site or application content here -->

		<!-- header start -->
        <header class="header-pos">
			<!-- header-bottom-area start -->
			<div id="sticker" class="header-bottom-area header-bg-2">
				<div class="container">
					<div class="inner-container">
						<div class="row">
							<div class="col-md-2 col-sm-4 col-xs-6">
								<div class="logo">
									<a href="{{ url('/') }}"><img src="{{ asset('web/img/logo-white.png') }}" alt="" /></a>
								</div>
							</div>
							<div class="col-md-8 hidden-xs hidden-sm">
								<div class="main-menu">
									<nav>
										<ul>
											<li><a href="{{ url('/') }}">home</a></li>
											<li><a href="{{ route('web.whats_new', ['sort_by' => encrypt(1)]) }}">what's new</a></li>
											<li><a href="#">women</a>
												<ul>
													@if(count($header_data['women_sub_categories']) > 0)
														@foreach($header_data['women_sub_categories'] as $item)
														<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($item->id), 'top_category_id' => encrypt($item->top_category_id)]) }}">{{ $item->sub_cate_name }}</a></li>
														@endforeach
													@endif
												</ul>
											</li>
											<li><a href="#">men</a>
												<ul>
													@if(count($header_data['men_sub_categories']) > 0)
														@foreach($header_data['men_sub_categories'] as $item)
														<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($item->id), 'top_category_id' => encrypt($item->top_category_id)]) }}">{{ $item->sub_cate_name }}</a></li>
														@endforeach
													@endif
												</ul>
											</li>
											<li><a href="{{ route('web.theme') }}">theme</a></li>
											<li><a href="#">about</a></li>
											<li><a href="#">contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-md-2 col-sm-8 col-xs-6 header-right">
								<div class="my-cart">
									<div class="total-cart">
										<a>
											<img src="{{ asset('web/img/cart/user.png') }}" alt="" />
										</a>
									</div>
									<ul>
										@auth('users')
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.my_profile') }}" style="font-size: 17px;">
														<font style="margin-left: 10px;">My Account</font>
													</a>
												</h5>
											</div>
										</li>
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.my_order_history') }}"  style="font-size: 17px;">
														<font style="margin-left: 10px;">My Orders</font>
													</a>
												</h5>
											</div>
										</li>
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.wish_list') }}" style="font-size: 17px;">
														<font style="margin-left: 10px;">Wish List</font>
													</a>
												</h5>
											</div>
										</li>
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.logout') }}" style="font-size: 17px;">
														<font style="margin-left: 10px;">Logout</font>
													</a>
												</h5>
											</div>
										</li>
										@else
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.login') }}" style="font-size: 17px;">
														<i class="fa fa-sign-in" aria-hidden="true"></i>
														<font style="margin-left: 10px;">Login</font>
													</a>
												</h5>
											</div>
										</li>
										<li>
											<div class="cart-info">
												<h5>
													<a href="{{ route('web.register') }}" style="font-size: 17px;">
														<i class="fa fa-user-plus"aria-hidden="true"></i>
														<font style="margin-left: 10px;">Register</font>
													</a>
												</h5>
											</div>
										</li>
										@endauth
									</ul>
								</div>

								<div class="my-cart">
									<div class="total-cart">
										<a>
											<img src="{{ asset('web/img/cart/icon-white.png') }}" alt="" />
											<span>
												@if(count($header_data['cart_data']) > 0)
													{{ count($header_data['cart_data']) }}
												@else
													{{ 0 }}
												@endif
											</span>
										</a>
									</div>
									<ul>
										@if(count($header_data['cart_data']) > 0)
											@php
												$total = 0;
											@endphp
											@foreach($header_data['cart_data'] as $product_id => $item)
											<li>
												<div class="cart-img">
													<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['product_id'])]) }}"><img alt="{{ $item['product_name'] }}" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['product_id'])]) }}"></a>
												</div>
												<div class="cart-info">
													<h4><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['product_id'])]) }}">{{ $item['product_name'] }}</a></h4>
													<span>
														₹
														@php
															if (!empty($item['discount'])) {
																$discount = ($item['price'] * $item['discount']) / 100;
																$selling_amount = $item['price'] - $discount;

																$sub_total = $selling_amount * $item['quantity'];

																print $selling_amount;
															} else {

																$sub_total = $item['price'] * $item['quantity'];
																print $item['price'];
															}

															$total = $total + $sub_total;
														@endphp
														<span>
													 		x {{ $item['quantity'] }}
													 	</span>
													</span>
												</div>
												<div class="del-icon">
													<a href="{{ route('web.remove_cart_item', ['stock_id' => encrypt($item['stock_id'])]) }}"><i class="fa fa-times-circle"></i></a>
												</div>
											</li>
											@endforeach
											<li class="cart-border">
												<div class="subtotal-text">Subtotal: </div>
												<div class="subtotal-price">₹ {{ $total }}</div>
											</li>
											<li>
												<a class="cart-button" href="{{ route('web.view_cart') }}">view cart</a>
												<a class="checkout" href="{{ route('web.checkout') }}">checkout</a>
											</li>
										@else
										<li>
											<center>
												<h4>
													Cart is Empty
												</h4>
											</center>
										</li>
										@endif
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-bottom-area end -->
			<!-- mobile-menu-area start -->
			<div class="mobile-menu-area visible-xs visible-sm">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul>
											<li><a href="{{ url('/') }}">home</a></li>
											<li><a href="{{ route('web.whats_new', ['sort_by' => encrypt(1)]) }}">what's new</a></li>
											<li><a href="#">women</a>
												<ul>
													@if(count($header_data['women_sub_categories']) > 0)
														@foreach($header_data['women_sub_categories'] as $item)
														<li><a href="about.html">{{ $item->sub_cate_name }}</a></li>
														@endforeach
													@endif
												</ul>
											</li>
											<li><a href="#">men</a>
												<ul>
													@if(count($header_data['men_sub_categories']) > 0)
														@foreach($header_data['men_sub_categories'] as $item)
														<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($item->id), 'top_category_id' => encrypt($item->top_category_id)]) }}">{{ $item->sub_cate_name }}</a></li>
														@endforeach
													@endif
												</ul>
											</li>
											<li><a href="{{ route('web.theme') }}">theme</a></li>
											<li><a href="#">about</a></li>
											<li><a href="#">contact</a></li>
										</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area end -->
		</header>
		<!-- header end -->