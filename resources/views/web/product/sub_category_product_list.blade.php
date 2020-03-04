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
							<h1>CIEL COUTRURE</h1>
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
								<li><a href="{{route('web.sub_category_product_list', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id)]) }}">shop</a></li>
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
					<!-- left-sidebar start -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<!-- widget-categories start -->
						<aside class="widget widget-categories">
							<h3 class="sidebar-title">Categories</h3>
							<ul class="sidebar-menu">
								@if(count($all_sub_category) > 0)
									@foreach($all_sub_category as $item)
									<li><a href="{{ route('web.sub_category_product_list', ['sub_category_id' => encrypt($item['id']), 'top_category_id' => encrypt($top_category_id)]) }}">{{ $item['sub_cate_name'] }}</a> <span class="count">({{ $item['total_products'] }})</span></li>
									@endforeach
								@endif
							</ul>
						</aside>
						<!-- widget-categories end -->
						<!-- filter-by start -->
						<aside class="widget filter-by">
							<h3 class="sidebar-title">Product Size</h3>
							<ul class="sidebar-menu">
								@if(count($all_size) > 0)
									@foreach($all_size as $item)
									<li><a href="{{ route('web.sub_category_size_product_list', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id), 'size_id' => encrypt($item['id'])]) }}">{{ $item['size'] }}</a></li>
									@endforeach
								@endif
							</ul>
						</aside>
						<!-- filter-by end -->
						<!-- widget start -->
						@if(!empty($recent_product_record) && (count($recent_product_record) > 0))
						<aside class="widget widget-categories">
							<h3 class="sidebar-title">Recent Product</h3>
							<div class="recent-product">
								@foreach($recent_product_record as $item)
								<div class="single-product">
									<div class="product-img">
										<a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}" target="_blank">
											<img src="{{ route('web.product_banner_image', ['product_id' => encrypt($item->id)]) }}" alt="" />
											<img class="secondary-img" src="{{ route('web.product_banner_image', ['product_id' => encrypt($item->id)]) }}" alt="Product Image" />
										</a>
									</div>
									<div class="product-content">
										<h3><a href="{{ route('web.product_detail', ['product_id' => encrypt($item->id)]) }}" target="_blank">{{ $item->product_name }}</a></h3>
										<div class="price">
											<span>₹
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
						@endif
						<!-- widget end -->
					</div>
					<!-- left-sidebar end -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="shop-content">
							<!-- Nav tabs -->
							<ul class="shop-tab" role="tablist">
								<li><span class="sorting-name"> View as:  </span></li>
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a></li>
								<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
							</ul>
							<div class="short-by">
								<form autocomplete="off" method="POST" action="{{ route('web.sub_category_size_sorted_by_product_list', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id), 'size_id' => encrypt($size_id)]) }}">
									@csrf
									<div class="row">
										<div class="col-6 col-md-6">
											<select name="sorted_by" id="sorted_by">
												@if($sorted_by == 1)
													<option value="1" selected>newness</option>
													<option value="2">low to high</option>
													<option value="3">high to low</option>
												@elseif($sorted_by == 2)
													<option value="1">newness</option>
													<option value="2" selected>low to high</option>
													<option value="3">high to low</option>
												@elseif($sorted_by == 3)
													<option value="1">newness</option>
													<option value="2">low to high</option>
													<option value="3" selected>high to low</option>
												@endif
											</select>
										</div>
										<div class="col-6 col-md-6">
											<button name="submit" class="filter-btn" type="submit">FILTER</button>
										</div>
									</div>
								</form>
							</div>
							<div class="clear"></div>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="row" id="product-data">
										@include('web.product.product_data')
									</div>
									<div class="ajax-load text-center" style="display:none">
										<p><img src="{{ asset('logo/loader.gif') }}">Loading More post</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- shop-area end -->
@endsection

@section('script')
<script type="text/javascript">
var page = 1;

$(window).scroll(function() {
	if($(window).scrollTop() > $('#product-data').height()) {
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
	    $("#product-data").append(data.html);
	})
	.fail(function(jqXHR, ajaxOptions, thrownError)
	{
	    alert('server not responding...');
	});
}
</script>
@endsection