@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>PRODUCT SINGLE STYLE</h1>
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
								<li><a>{{ $top_sub_category_detail[0]->top_cate_name }}</a></li>
								<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($top_sub_category_detail[0]->id), 'top_category_id' => encrypt($top_sub_category_detail[0]->top_category_id)]) }}">{{ $top_sub_category_detail[0]->sub_cate_name }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<!-- shop-area start -->
		<div class="shop-area">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="single-pro-tab-content">
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="home">
											<a href="#">
												<img class="zoom" src="{{ route('web.product_banner_image', ['product_id' => encrypt($product_detail->id)]) }}" data-zoom-image="{{ route('web.product_banner_image', ['product_id' => encrypt($product_detail->id)]) }}" alt="" />
											</a>
										</div>
										@foreach($product_slider_images as $key => $item)
										<div role="tabpanel" class="tab-pane" id="home{{ $key }}">
											<a href="#">
												<img class="zoom" src="{{ route('web.product_additional_image', ['product_additional_img_id' => encrypt($item->id)]) }}" data-zoom-image="{{ route('web.product_additional_image', ['product_additional_img_id' => encrypt($item->id)]) }}" alt="" />
											</a>
										</div>
										@endforeach
									</div>
									<!-- Nav tabs -->
									<ul class="single-product-tab" role="tablist">
										<li role="presentation" class="active">
											<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><img src="{{ route('web.product_banner_image', ['product_id' => encrypt($product_detail->id)]) }}" alt="" />
											</a>
										</li>
										@foreach($product_slider_images as $key => $item)
										<li role="presentation">
											<a href="#home{{ $key }}" aria-controls="home" role="tab" data-toggle="tab"><img src="{{ route('web.product_additional_image', ['product_additional_img_id' => encrypt($item->id)]) }}" alt="" />
											</a>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-12 shop-list shop-details">
								<div class="product-content">
									<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($product_detail->id)]) }}">{{ $product_detail->product_name }}</a></h3>
									<div class="price">
										<span>₹
											@if(!empty($product_detail->discount))
												@php
												$discount = ceil(($product_detail->price * $product_detail->discount) / 100);
												$selling_price = $product_detail->price - $discount;
												@endphp
												{{ $selling_price }}
											@else
												{{ $item->price }}
											@endif
										</span>
										<span class="old">₹{{ $product_detail->price }}</span>
									</div>
									<div class="s-p-rating">
										@php
											if (count($reviews) > 0) {
												$total_reviews = 0;
												for ($i=0; $i < count($reviews); $i++) { 
													$total_reviews = $total_reviews + $reviews[$i]->star;
												}

												$avg_reviews = floor($total_reviews / count($reviews));
											}
										@endphp
										<span class="rating">
										@if(count($reviews) > 0)
											@for($i = 0; $i < $avg_reviews; $i++)
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
										</span>
										<span class="review-no">{{ (count($reviews) > 0)? count($reviews): 0 }} Review (s)</span>
									</div>
									<p>{!! $product_detail->desc !!}</p>
									<div class="pro-size">
										<label>size <span>*</span></label>
										<select id="product_sizes_id" name="product_sizes_id">
											@foreach($product_sizes as $key => $item)
												@if($item->id == $product_detail->size_id)
													<option value="{{ $item->id }}" selected>{{ $item->size }}</option>
												@else
													<option value="{{ $item->id }}">{{ $item->size }}</option>
												@endif
											@endforeach
										</select>
									</div>
									<div class="pro-size">
										<label>color <span>*</span></label>
										<select id="product_colors_id" name="product_colors_id">
											@foreach($product_colors as $key => $item)
												@if($item->id == $product_detail->color_id)
													<option value="{{ $item->id }}" selected>{{ $item->color }}</option>
												@else
													<option value="{{ $item->id }}">{{ $item->color }}</option>
												@endif
											@endforeach
										</select>
									</div>
									<font id="stock-status">In Stock</font>
									<div class="product-action">
										<form action="{{ route('web.add_cart', ['product_id' => encrypt($product_detail->stock_id)]) }}" method="POST" autocomplete="off">
											@csrf
											<input type="hidden" name="stock_id" required id="stock_id" value="{{ encrypt($product_detail->stock_id) }}">
										<div class="cart-plus">
											<div class="cart-plus-minus"><input type="text" value="1" name="quantity" /></div>
										</div>										
										<div class="button-cart" id="cart_button">
											<button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
										</form>
										<div class="button-top">
											<a href="{{ route('web.add_wish_list', ['product_id' => encrypt($product_detail->id)]) }}" ><i class="fa fa-heart"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="product-tabs">
										<div>
										  <!-- Nav tabs -->
										  <ul class="pro-details-tab" role="tablist">
											<li role="presentation" class="active"><a href="#tab-desc" aria-controls="tab-desc" role="tab" data-toggle="tab">Description</a></li>
											<li role="presentation"><a href="#page-comments" aria-controls="page-comments" role="tab" data-toggle="tab">Reviews ({{ (count($reviews) > 0)? count($reviews): 0 }})</a></li>
										  </ul>
										  <!-- Tab panes -->
										  <div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="tab-desc">
												<div class="product-tab-desc">
													<p>Theme : {{ $product_detail->theme }}</p>
													<p>{!! $product_detail->desc !!}</p>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="page-comments">
												<div class="product-tab-desc">
													<div class="product-page-comments">
														<ul>
														@if(count($reviews) > 0)
															@foreach($reviews as $key => $item)
															<li>
																<div class="product-comments">
																	<div class="product-comments-content">
																		<p><strong>{{ $item->name }}</strong> -
																			<span>{{ \Carbon\Carbon::parse($item->created_at)->toDayDateTimeString() }}</span>
																			<span class="pro-comments-rating">
																				@for($i = 0; $i < $item->star; $i++)
																					<i class="fa fa-star"></i>
																				@endfor
																			</span>
																		</p>
																		<div class="desc">
																			{{ $item->comment }}
																		</div>
																	</div>
																</div>
															</li>
															@endforeach
														@endif
														</ul>
														<div class="review-form-wrapper">
															<h3>Add a review</h3>
															<form action="{{ route('web.add_review') }}" method="POST" autocomplete="off">
																@csrf
																<input type="hidden" name="product_id" value="{{ encrypt($product_detail->id) }}" required readonly>
																<div class="your-rating">
																	<h5>Your Rating</h5>
																	<span>
																		<input type="checkbox" name="star[]">
																		<input type="checkbox" name="star[]">
																		<input type="checkbox" name="star[]">
																		<input type="checkbox" name="star[]">
																		<input type="checkbox" name="star[]">
																	</span>
																</div>
																<textarea id="product-message" cols="30" rows="10" placeholder="Your Comment" name="comment"></textarea>
																<input type="submit" value="submit" />
															</form>
														</div>
													</div>
												</div>
											</div>
										  </div>
										</div>
									</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="section-title text-center">
									<h2>Related Product </h2>
									<img src="img/section-title.png" alt="" />
								</div>
							</div>
							<div class="related-curosel">
								@foreach($related_record as $key => $item)
								<!-- single-product start -->
								<div class="col-md-12">
									<div class="single-product">
										<div class="product-img">
											<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}">
												<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="" />
												<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['id'])]) }}" alt="" />
											</a>
											<span class="tag-line">new</span>
											<div class="product-action">
												<div class="button-top">
													<a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}"><i class="fa fa-shopping-cart"></i></a>
													<a href="#" ><i class="fa fa-heart"></i></a>
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
											<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['id'])]) }}">{{ $item['product_name']}}</a></h3>
											<div class="price">
												<span>
													₹
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
												<span class="old">₹{{ $item['price'] }}</span>
											</div>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								@endforeach
							</div>
						</div>
					</div>
					<!-- left-sidebar start -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<!-- widget-categories start -->
						<aside class="widget widget-categories">
							<h3 class="sidebar-title">Categories</h3>
							<ul class="sidebar-menu">
								@foreach($sub_categories as $key => $item)
									<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($item['id']), 'top_category_id' => encrypt($item['top_category_id'])]) }}">{{ $item['sub_cate_name'] }}</a> <span class="count">({{ $item['total_products'] }})</span></li>
								@endforeach
							</ul>
						</aside>
						<!-- widget-categories end -->
						<!-- widget start -->
						<aside class="widget widget-categories">
							<h3 class="sidebar-title">Recent Product</h3>
							<div class="recent-product">
								@foreach($recent_product_record as $key => $item)
								<div class="single-product">
									<div class="product-img">
										<a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}">
											<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item->id)]) }}" alt="" />
											<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item->id)]) }}" alt="" />
										</a>
									</div>
									<div class="product-content">
										<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}">{{ $item->product_name }}</a></h3>
										<div class="price">
											<span>
												₹
												@if(!empty($item->discount))
													@php
														$discount = ceil(($item->price * $item->discount) / 100);
														$selling_price = $item->price - $discount;
													@endphp
													{{ $selling_price }}
												@else
													{{ $item->price }}
												@endif
											</span>
											<span class="old">₹{{ $item->price }}</span>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</aside>
						<!-- widget end -->
					</div>
					<!-- left-sidebar end -->
				</div>
			</div>
		</div>
		<!-- shop-area end -->
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('#product_colors_id').change(function(){
        var product_colors_id = $('#product_colors_id').val();
        var product_sizes_id  = $('#product_sizes_id').val();

        $('#stock-status').text('Checking...');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url   : "{{ url('checking-product-stock') }}",
            data  : {
                'product_id': {{ $product_detail->id }},
                'product_colors_id' : product_sizes_id,
                'product_colors_id' : product_colors_id
            },
            success: function(response) {
                var response = response.split(',');
                $('#stock-status').text(response[0]);
                $('#cart_button').html(response[1]);
                $('#stock_id').val(response[2]);
            }
        }); 
    });

    $('#product_sizes_id').change(function(){

        var product_colors_id = $('#product_colors_id').val();
        var product_sizes_id  = $('#product_sizes_id').val();

        $('#stock-status').text('Checking...');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url   : "{{ url('checking-product-stock') }}",
            data  : {
                'product_id': {{ $product_detail->id }},
                'product_sizes_id' : product_sizes_id,
                'product_colors_id' : product_colors_id
            },
            success: function(response) {
            	var response = response.split(',');
                $('#stock-status').text(response[0]);
                $('#cart_button').html(response[1]);
                $('#stock_id').val(response[2]);
            }
        }); 
    });
});
</script>
@endsection