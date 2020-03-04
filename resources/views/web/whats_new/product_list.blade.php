@extends('web.template.master')

@section('content')
<!-- page-title-area start -->
		<div class="page-title-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-heading text-center">
							<h1>OUR SHOP WITH 4 column</h1>
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
								<li><span>What's New</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area end -->
		<!-- shop-area start -->
		<div class="shop-area shop-full">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="shop-content">
							<!-- Nav tabs -->
							<ul class="shop-tab" role="tablist">
								<li><span class="sorting-name"> View as:  </span></li>
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a></li>
							</ul>
							<div class="short-by">
								<form method="POST" autocomplete="off" action="{{ route('web.whats_new_sort') }}">
									@csrf
								<span class="sorting-show"> Sort by:</span>
								<select name="sort_by">
									@if($sort_by == 1)
										<option value="1" selected>low to high</option>
										<option value="2">high to low</option>
									@elseif($sort_by == 2)
										<option value="1">low to high</option>
										<option value="2" selected>high to low</option>
									@else
										<option value="1">low to high</option>
										<option value="2">high to low</option>
									@endif
								</select>
								<button name="submit" class="filter-btn" type="submit">FILTER</button>
								</form>
							</div>
							<div class="clear"></div>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="row" id="product-data">
										@include('web.whats_new.product_data')
									</div>
								</div>
							</div>
							<div class="ajax-load text-center" style="display:none">
								<p><img src="{{ asset('logo/loader.gif') }}">Loading More post</p>
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