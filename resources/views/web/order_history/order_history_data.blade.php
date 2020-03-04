<!-- wishlist-area start -->
@foreach($order_history as $key => $item)
		<div class="wishlist-area" id="order_table">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="wishlist-content">
								<div class="wishlist-table table-responsive">
									<table>
										<thead>
											<tr>
												<th class="product-remove" colspan="4"  style="text-align: left">Order ID: {{ $item['order_id'] }}</th>
												<th class="product-price" colspan="4"  style="text-align: right">Order Date: {{ $item['order_date'] }}</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Image</th>
												<th>Product Name</th>
												<th>Size</th>
												<th>Color</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Discount</th>
												<th>Subtotal</th>
											</tr>
											@php
												$total = 0;
											@endphp
											@foreach($item['order_detail'] as $key_1 => $item_1)
											<tr>
												<td class="product-thumbnail"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item_1->id)]) }}"><img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item_1->id)]) }}" alt="" /></a></td>
												<td class="product-name"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item_1->id)]) }}">{{ $item_1->product_name }}</a></td>
												<td class="product-price"><span class="amount">{{ $item_1->size }}</span></td>
												<td class="product-price"><span class="amount">{{ $item_1->color }}</span></td>
												<td class="product-price"><span class="amount">{{ $item_1->quantity }}</span></td>
												<td class="product-price"><span class="amount">₹ {{ $item_1->price }}</span></td>
												<td class="product-price"><span class="amount">₹ {{ $item_1->discount }}</span></td>
												<td class="product-price"><span class="amount">₹ 
													@php
														if (!empty($item_1->discount)) {
															$discount = ($item_1->price * $item_1->discount) / 100;
															$selling_amount = $item_1->price - $discount;

															$sub_total = $selling_amount * $item_1->quantity;
														} else 
															$sub_total = $item_1->price * $item_1->quantity;

														$total = $total + $sub_total;
													@endphp
													{{ $sub_total }}
												</span></td>
											</tr>
											@endforeach
											<tr>
												<th colspan="6" style="text-align: left;">Billing Address : {{ $item['billing_address']->first_name }} {{ $item['billing_address']->last_name }}, {{ $item['billing_address']->address }}, 
													@if(!empty($item['billing_address']->email ))
														{{ $item['billing_address']->email }}, 
													@endif
													{{ $item['billing_address']->mobile_no }}, {{ $item['billing_address']->city }}, {{ $item['billing_address']->pin_code }}, {{ $item['billing_address']->state }}
												</th>
												<th>Total</th>
												<th>₹ {{ $total }}</th>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th class="product-remove" colspan="4"  style="text-align: left">Order Status: {{ $item['order_status'] }}</th>
												<th class="product-price" colspan="4"  style="text-align: right">Payment Status: {{ $item['payment_status'] }}</th>
											</tr>
										</tfoot>
									</table>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<!-- wishlist-area end -->