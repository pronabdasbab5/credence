@foreach($product_record as $key => $item)
										<!-- single-product start -->
										<div class="col-md-3 col-sm-4">
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