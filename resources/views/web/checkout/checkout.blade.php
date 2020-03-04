@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>Our CHECKOUT PAGE</h1>
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
								<li><a href="{{ route('web.view_cart') }}">Shopping Cart</a></li>
								<li><span>Checkout</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<br><br>
		<!-- checkout-area start -->
		<div class="checkout-area">
			<div class="container">
				<div class="row">

						<div class="col-lg-6 col-md-6">
							<div class="your-order">
								{{-- <form autocomplete="off" method="POST" action="{{ route('web.place_order') }}"> --}}
									{{-- @csrf --}}
								<h3>Your order</h3>
								<div class="your-order-table table-responsive">
									<table>
											<tr class="cart-subtotal">
												<th>Cart Subtotal</th>
												<td><span class="amount">₹ {{ $sub_total }}</span></td>
											</tr>
											<tr class="shipping">
												<th>Shipping</th>
												<td>
													<ul>
														<li>
															<input type="radio" />
															<label>Free Shipping:</label>
														</li>
													</ul>
												</td>
											</tr>
											<tr class="order-total">
												<th>Order Total</th>
												<td><strong><span class="amount">₹ {{ $sub_total }}</span></strong>
												</td>
											</tr>
									</table>
								</div>
								<div class="payment-method">
									<div>
										<center>
											<a href="javascript:void(0)" data-amount="{{ $sub_total }}" class="buy_now btn order-button-payment">Place order</a>
										</center>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="checkbox-form">
								<h3>Billing Details</h3>
								<div class="row">
									<div class="col-md-12">
										@if(count($all_address) > 0)
											@foreach($all_address as $key => $item)
											<div class="row" style="padding: 10px 20px;">
												<div class="col-md-12">
													<input type="radio" name="address_id" value="{{ $item->id }}" required> 
													<b>
														{{ $item->first_name." ".$item->last_name }}, {{ $item->address }}, {{ $item->city }}, {{ $item->pin_code }}, {{ $item->email }}, {{ $item->mobile_no }}, {{ $item->state }} 
													</b>
												</div>
											</div>
											@endforeach
											@error('address_id')
												{{ $message }}
											@enderror
										@endif
									</div>
								</div>
							{{-- </form> --}}
								<div class="different-address">
										<div class="ship-different-title">
											<br>
											<h4>
												<label>Add New address?</label>
												<input id="ship-box" type="checkbox" />
											</h4>
										</div>
										<form method="POST" autocomplete="off" action="{{ route('web.add_address') }}">
											@csrf
									<div id="ship-box-info" class="row">
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>First Name <span class="required">*</span></label>
												<input type="text" name="first_name" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>Last Name <span class="required">*</span></label>
												<input type="text" name="last_name" required />
											</div>
										</div>
										<div class="col-md-12">
											<div class="checkout-form-list">
												<label>Address <span class="required">*</span></label>
												<input type="text" name="address" required />
											</div>
										</div>
										<div class="col-md-12">
											<div class="checkout-form-list">
												<label>Town / City <span class="required">*</span></label>
												<input type="text" name="city" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>State / County <span class="required">*</span></label>
												<input type="text" name="state" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>PIN Code <span class="required">*</span></label>
												<input type="text" name="pin_code" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>Email <span class="required">*</span></label>
												<input type="email" name="email"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkout-form-list">
												<label>Mobile No  <span class="required">*</span></label>
												<input type="text" name="mobile_no" required />
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary">Add</button>
										</div>
									</div>
										</form>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-- checkout-area end -->
@endsection

@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 

$('body').on('click', '.buy_now', function(e){

	if($("input:radio[name='address_id']").is(":checked")) {

		var address_id = $('input[name=address_id]:checked').val();
	    var totalAmount = $(this).attr("data-amount");
	    var options = {
	        "key": "rzp_live_ILgsfZCZoFIKMb",
	        "amount": (1 * 100),
	        "currency": "INR",
	        "name": "Ciel Couture",
	        "description": "Payment",
	        "image": "https://www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
	        "handler": function (response){
	            
	            $.ajax({
	                url: SITEURL + 'place-order',
	                type: 'post',
	                dataType: 'json',
	                data: {
	                    razorpay_payment_id: response.razorpay_payment_id ,
	                    razorpay_order_id: response.razorpay_order_id,
	                    razorpay_signature: response.razorpay_signature,
	                    totalAmount : totalAmount,
	                    address_id: address_id
	                }, 
	                success: function (msg) {
	                    window.location.href = SITEURL + 'thankyou';
	                }
	            });
	        },
	        "prefill": {
	        	"name": '{{ Auth::user()->name }}',
	            "contact": '{{ Auth::user()->contact_no }}',
	            @if(!empty(Auth::user()->email))
	            	"email": '{{ Auth::user()->email }}'
	            @else
	            	"email": 'pronabdasbaba5@gmail.com'
	            @endif
	        },
	        "theme": {
	            "color": "#528FF0"
	        }
	    };
	    
	    var rzp1 = new Razorpay(options);
	    rzp1.open();
	    e.preventDefault();
  	} else {
  		alert('Please ! Select Address');
  	}
});
</script>
@endsection
