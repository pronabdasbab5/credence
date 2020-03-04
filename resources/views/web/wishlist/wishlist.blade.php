@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>My Wishlist</h1>
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
								<li><a href="{{ route('web.index') }}">HOME</a></li>
								<li><a href="{{ route('web.view_cart') }}">Shopping cart</a></li>
								<li><span>Wishlist</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<!-- wishlist-area start -->
		<div class="wishlist-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="wishlist-content">
							<form action="#">
								<div class="wishlist-table table-responsive">
									<table>
										<thead>
											<tr>
												<th class="product-remove"><span class="nobr">Remove</span></th>
												<th class="product-thumbnail">Image</th>
												<th class="product-name"><span class="nobr">Product Name</span></th>
												<th class="product-price"><span class="nobr"> Unit Price </span></th>
												<th class="product-price"><span class="nobr"> Discount </span></th>
												<th class="product-add-to-cart"><span class="nobr">Go To Cart </span></th>
											</tr>
										</thead>
										<tbody>
											@foreach($wishlist as $key => $item)
											<tr>
												<td class="product-remove"><a href="{{ route('web.remove_wish_list', ['product_id' => encrypt($item->id)]) }}">×</a></td>
												<td class="product-thumbnail"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}"><img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item->id)]) }}" alt="" /></a></td>
												<td class="product-name"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}">{{ $item->product_name }}</a></td>
												<td class="product-price"><span class="amount">₹ {{ $item->price }}</span></td>
												<td class="product-price"><span class="amount">₹ {{ $item->discount }}</span></td>
												<td class="product-add-to-cart"><a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}"> Go to Cart</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- wishlist-area end -->
@endsection
