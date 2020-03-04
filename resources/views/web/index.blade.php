@extends('web.template.master')

@section('content')
<!-- slider-area start -->
		<div class="slider-area">
			<div class="slider-active">
				<div class="single-slider slide-height-full d-flex align-items-center" data-background="{{ asset('web/img/slider/slide5.jpg') }}">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="slide-content slide-white">
									<h1 data-animation="fadeInUp" data-delay=".5s">Best Fashion Shop</h1>
									<p data-animation="fadeInUp" data-delay="1s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
										<br> eiusmod tempor incididunt ut labore et dolore magna</p>
									<a class="btn btn-white" href="shop.html" data-animation="fadeInUp" data-delay="1.5s">shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="single-slider slide-height-full d-flex align-items-center" data-background="{{ asset('web/img/slider/slide6.jpg') }}">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2">
								<div class="slide-content slide-white text-center">
									<h1 data-animation="fadeInUp" data-delay=".5s">Trendy Fashion Shop</h1>
									<p data-animation="fadeInUp" data-delay="1s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
										<br> eiusmod tempor incididunt ut labore
										et dolore magna</p>
									<a class="btn btn-white" href="shop.html" data-animation="fadeInUp" data-delay="1.5s">shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="single-slider slide-height-full d-flex align-items-center" data-background="{{ asset('web/img/slider/slide3.jpg') }}">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="slide-content slide-white">
									<h1 data-animation="fadeInUp" data-delay=".5s">Best Fashion Shop</h1>
									<p data-animation="fadeInUp" data-delay="1s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
										<br> eiusmod tempor incididunt ut labore
										et dolore magna</p>
									<a class="btn btn-white" href="shop.html" data-animation="fadeInUp" data-delay="1.5s">shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area end -->
		<!-- banner-area start -->
		<div class="banner-area bg-color pad-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 hidden-sm">
						<div class="single-banner banner-item1">
							<a class="banner-thumb" href="#">
								<img src="{{ asset('web/img/banner/shop-cat4.jpg') }}" alt="" />
							</a>
							<div class="banner-caption">
								<span class="shop-cat-subtitle">Black</span>
								<h2><a href="#">Collection</a></h2>
								<span class="shop-cat-sale">Save up to 30% off</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="single-banner banner-item2">
									<a class="banner-thumb" href="#">
										<img src="{{ asset('web/img/banner/shop-cat5.jpg') }}" alt="" />
									</a>
									<div class="banner-caption">
										<span class="shop-cat-subtitle">Sale off</span>
										<h2><a href="#">hot fashion</a></h2>
										<span class="shop-cat-sale">cloth Collection 2018</span>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="single-banner banner-item2">
									<a class="banner-thumb" href="#">
										<img src="{{ asset('web/img/banner/banner1.jpg') }}" alt="" />
									</a>
									<div class="banner-caption">
										<span class="shop-cat-subtitle">Sale off</span>
										<h2><a href="#">new fashion</a></h2>
										<span class="shop-cat-sale">cloth Collection 2018</span>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="single-banner banner-item2 banner-marg">
									<a class="banner-thumb" href="#">
										<img src="{{ asset('web/img/banner/shop-cat7.jpg') }}" alt="" />
									</a>
									<div class="banner-caption">
										<span class="shop-cat-subtitle">Sale off</span>
										<h2><a href="#">women fashion</a></h2>
										<span class="shop-cat-sale">cloth Collection 2018</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area end -->
		<!-- category-area start -->
		@if(!empty($feature_product_record) && (count($feature_product_record) > 0))
		<div class="category-area category-area-2 pad-60">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Features product</h2>
							<img src="{{ asset('web/img/section-title.png') }}" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="product-curosel">
						@foreach($feature_product_record as $item)
						<!-- single-product start -->
						<div class="col-md-12">
							<div class="single-product">
								<div class="product-img">
									<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">
										<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
										<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
									</a>
									<span class="tag-line">new</span>
									<div class="product-action">
										<div class="button-top">
											<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank"><i class="fa fa-shopping-cart"></i></a>
											<a href="{{ route('web.add_wish_list', ['product_id' => encrypt($item['id'])]) }}" ><i class="fa fa-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="product-content">
									<div class="pro-rating">
									@if(count($item['star']) > 0)
										@for($i = 0; $i < $item['star']; $i++)
											<i class="fa fa-star"></i>
										@endfor

										@for($j = $i; $j < 5; $j++)
											<i class="fa fa-star-o"></i>
										@endfor
									@else
										@for($j = 0; $j < 5; $j++)
											<i class="fa fa-star-o"></i>
										@endfor
									@endif
									</div>
									<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">{{ $item['product_name'] }}</a></h3>
									<div class="price">
										<span>₹
											@if(!empty($item['discount']))
												@php
													$discount = ceil(($item['price'] * $item['discount']) / 100);
													$selling_price = $item['price'] - $discount;
												@endphp
												{{ $selling_price }}
											@else
												{{ $item['price'] }}
											@endif
										</span>
										<span class="old">₹ {{ $item['price'] }}</span>
									</div>
								</div>
							</div>
						</div>
						<!-- single-product end -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
		@endif
		<!-- category-area end -->
		<!-- testimonial-area start -->
		<div class="service-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="single-service">
							<div class="service-icon">
								<i class="fa fa-money" aria-hidden="true"></i>
							</div>
							<div class="service-content">
								<h3>Money Back Guarantee!</h3>
								<p>We free 30 days 100% money back & return</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="single-service">
							<div class="service-icon">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="service-content">
								<h3>Free Shipping World wide</h3>
								<p>Free shipping on all order over $99.00</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="single-service">
							<div class="service-icon">
								<i class="fa fa-comment-o" aria-hidden="true"></i>
							</div>
							<div class="service-content">
								<h3>Online Support 24/7</h3>
								<p>We are here to make your day. Let’s talk !</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial-area end -->
		<!-- featured-area start -->
		<div class="featured-area pad-60">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product-tab">
						    <!-- Nav tabs -->
							<ul class="product-nav" role="tablist">
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">most popular</a></li>
								<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">best seller</a></li>
								<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">new arrival</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="row">
										<div class="product-curosel">
											@if(!empty($most_popular_product_record) && (count($most_popular_product_record) > 0))
												@foreach($most_popular_product_record as $item)
												<!-- single-product start -->
												<div class="col-md-12">
													<div class="single-product">
														<div class="product-img">
															<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">
																<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
																<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
															</a>
															<span class="tag-line">new</span>
															<div class="product-action">
																<div class="button-top">
																	<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank"><i class="fa fa-shopping-cart"></i></a>
																	<a href="{{ route('web.add_wish_list', ['product_id' => encrypt($item['id'])]) }}" ><i class="fa fa-heart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<div class="pro-rating">
																@if(count($item['star']) > 0)
																	@for($i = 0; $i < $item['star']; $i++)
																		<i class="fa fa-star"></i>
																	@endfor

																	@for($j = $i; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@else
																	@for($j = 0; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@endif
															</div>
															<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">{{ $item['product_name'] }}</a></h3>
															<div class="price">
																<span>₹
																	@if(!empty($item['discount']))
																		@php
																			$discount = ceil(($item['price'] * $item['discount']) / 100);
																			$selling_price = $item['price'] - $discount;
																		@endphp
																		{{ $selling_price }}
																	@else
																		{{ $item['price'] }}
																	@endif
																</span>
																<span class="old">₹ {{ $item['price'] }}</span>
															</div>
														</div>
													</div>
												</div>
												<!-- single-product end -->
												@endforeach
											@endif
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="profile">
									<div class="row">
										<div class="product-curosel">
											@if(!empty($best_seller_product_record) && (count($best_seller_product_record) > 0))
												@foreach($best_seller_product_record as $item)
												<!-- single-product start -->
												<div class="col-md-12">
													<div class="single-product">
														<div class="product-img">
															<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">
																<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
																<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
															</a>
															<span class="tag-line">new</span>
															<div class="product-action">
																<div class="button-top">
																	<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank"><i class="fa fa-shopping-cart"></i></a>
																	<a href="{{ route('web.add_wish_list', ['product_id' => encrypt($item['id'])]) }}" ><i class="fa fa-heart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<div class="pro-rating">
																@if(count($item['star']) > 0)
																	@for($i = 0; $i < $item['star']; $i++)
																		<i class="fa fa-star"></i>
																	@endfor

																	@for($j = $i; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@else
																	@for($j = 0; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@endif
															</div>
															<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">{{ $item['product_name'] }}</a></h3>
															<div class="price">
																<span>₹
																	@if(!empty($item['discount']))
																		@php
																			$discount = ceil(($item['price'] * $item['discount']) / 100);
																			$selling_price = $item['price'] - $discount;
																		@endphp
																		{{ $selling_price }}
																	@else
																		{{ $item['price'] }}
																	@endif
																</span>
																<span class="old">₹ {{ $item['price'] }}</span>
															</div>
														</div>
													</div>
												</div>
												<!-- single-product end -->
												@endforeach
											@endif
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="messages">
									<div class="row">
										<div class="product-curosel">
											@if(!empty($new_product_record) && (count($new_product_record) > 0))
												@foreach($new_product_record as $item)
												<!-- single-product start -->
												<div class="col-md-12">
													<div class="single-product">
														<div class="product-img">
															<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">
																<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
																<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="{{ $item['product_name'] }}" />
															</a>
															<span class="tag-line">new</span>
															<div class="product-action">
																<div class="button-top">
																	<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank"><i class="fa fa-shopping-cart"></i></a>
																	<a href="{{ route('web.add_wish_list', ['product_id' => encrypt($item['id'])]) }}" ><i class="fa fa-heart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<div class="pro-rating">
																@if(count($item['star']) > 0)
																	@for($i = 0; $i < $item['star']; $i++)
																		<i class="fa fa-star"></i>
																	@endfor

																	@for($j = $i; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@else
																	@for($j = 0; $j < 5; $j++)
																		<i class="fa fa-star-o"></i>
																	@endfor
																@endif
															</div>
															<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}" target="_blank">{{ $item['product_name'] }}</a></h3>
															<div class="price">
																<span>₹
																	@if(!empty($item['discount']))
																		@php
																			$discount = ceil(($item['price'] * $item['discount']) / 100);
																			$selling_price = $item['price'] - $discount;
																		@endphp
																		{{ $selling_price }}
																	@else
																		{{ $item['price'] }}
																	@endif
																</span>
																<span class="old">₹ {{ $item['price'] }}</span>
															</div>
														</div>
													</div>
												</div>
												<!-- single-product end -->
												@endforeach
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- featured-area end -->
		<!-- brand-area start -->
		<div class="brand-area">
			<div class="container">
				<div class="brand-inner-container pad-60">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
								<h2>our brand</h2>
								<img src="{{ asset('web/img/section-title.png') }}" alt="" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="brand-curosel">
							@if(!empty($all_brand) && (count($all_brand) > 0))
								@foreach($all_brand as $key => $item)
								<div class="col-md-12">
									<div class="single-brand brand-slider">
										<a href="{{ route('web.brand_product', ['brand_id' => encrypt($item->id), 'sort_by' => encrypt(1)]) }}"><img src="{{ route('web.brand_banner', ['brand_id' => encrypt($item->id)]) }}" alt="{{ $item->brand_name }}" /></a>
									</div>
								</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- brand-area end -->
@endsection