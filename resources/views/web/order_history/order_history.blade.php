@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
<style type="text/css">
  		.ajax-load{
		    padding: 10px 0px;
		    width: 100%;
  		}
  	</style>
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>My Orders Hsitory</h1>
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
								<li><span>Order History</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		@include('web.order_history.order_history_data')
		<div class="ajax-load text-center" style="display:none">
			<p><img src="{{ asset('logo/loader.gif') }}">Loading More Orders</p>
		</div>
@endsection

@section('script')
<script type="text/javascript">
var page = 1;

$(window).scroll(function() {
	if($(window).scrollTop() > $('#order_table').height()) {
	    page++;
	    loadMoreData(page);
	}
});

function loadMoreData(page){

	$.ajax({
	    url: '?page=' + page,
	    type: "get",
	    beforeSend: function()
	    {
	        $('.ajax-load').show();
	    }
	})
	.done(function(data)
	{
	    if(data.html == " "){
	        $('.ajax-load').html("No more records found");
	        return;
	    }
	    $('.ajax-load').hide();
	    $("#order_table").append(data.html);
	})
	.fail(function(jqXHR, ajaxOptions, thrownError)
	{
	    alert('server not responding...');
	});
}
</script>
@endsection
