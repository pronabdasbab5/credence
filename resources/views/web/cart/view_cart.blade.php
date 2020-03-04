@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>our SHOPPING CART</h1>
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
								<li><span>Shopping Cart</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<!-- cart-main-area start -->
		<div class="cart-main-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<form action="{{ route('web.update_cart') }}" method="POST" autocomplete="off">
							@csrf
							<div class="table-content table-responsive">
								<table>
									<thead>
										<tr>
											<th class="product-thumbnail">Image</th>
											<th class="product-name">Product</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-subtotal">Total</th>
											<th class="product-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
										@php
											$total = 0;
										@endphp
										@if(count($cart_data) > 0)
											@foreach($cart_data as $item)
											<tr>
												<td class="product-thumbnail"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['product_id'])]) }}"><img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item['product_id'])]) }}" alt="" /></a></td>
												<td class="product-name"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item['product_id'])]) }}">{{ $item['product_name'] }}</a></td>
												<td class="product-price"><span class="amount">₹
													@php
														if (!empty($item['discount'])) {
															$discount = ($item['price'] * $item['discount']) / 100;
															$selling_amount = $item['price'] - $discount;

															print $selling_amount;
														} else
															print $item['price'];
													@endphp
												</span></td>
												<td class="product-quantity">
													<input type="hidden" name="stock_id[]" value="{{ $item['stock_id'] }}">
													<input type="number" value="{{ $item['quantity'] }}" name="quantity[]" min="1" />
												</td>
												<td class="product-subtotal">
													₹
													@php
														if (!empty($item['discount'])) {
															$discount = ($item['price'] * $item['discount']) / 100;
															$selling_amount = $item['price'] - $discount;

															$sub_total = $selling_amount * $item['quantity'];
															print $sub_total;
														} else {
															$sub_total = $item['price'] * $item['quantity'];
															print $sub_total;
														}

														$total = $total + $sub_total;
													@endphp
												</td>
												<td class="product-remove"><a href="{{ route('web.remove_cart_item', ['stock_id' => encrypt($item['stock_id'])]) }}"><i class="fa fa-times"></i></a></td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-7 col-xs-12">
									<div class="buttons-cart">
										<input type="submit" value="Update Cart" />
										<a href="{{ url('/') }}">Continue Shopping</a>
									</div>
								</div>
								<div class="col-md-4 col-sm-5 col-xs-12">
									<div class="cart_totals">
										<h2>Cart Totals</h2>
										<table>
											<tbody>
												<tr class="cart-subtotal">
													<th>Subtotal</th>
													<td><span class="amount">₹ {{ $total }}</span></td>
												</tr>
												<tr class="shipping">
													<th>Shipping</th>
													<td>
														<ul id="shipping_method">
															<li>
																<input type="radio" />
																<label>
																	Free Shipping
																</label>
															</li>
															<li></li>
														</ul>
														<p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
													</td>
												</tr>
												<tr class="order-total">
													<th>Total</th>
													<td>
														<strong>
															<span class="amount">₹ {{ $total }}</span>
														</strong>
													</td>
												</tr>
											</tbody>
										</table>
										<div class="wc-proceed-to-checkout">
											<a href="{{ route('web.checkout') }}">Proceed to Checkout</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- cart-main-area end -->
@endsection

@section('script')

@endsection