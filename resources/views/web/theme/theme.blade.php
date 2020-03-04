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
								<li><span>Theme</span></li>
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

							<div class="clear"></div>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="row">
										@if(!empty($theme))
											@foreach($theme as $key => $item)
											<!-- single-product start -->
											<div class="col-md-3 col-sm-4 hidden-sm">
												<div class="single-product">
													<div class="product-img">
														<a href="{{ route('web.theme_product', ['theme_id' => encrypt($item->id), 'sort_by' => encrypt(1)]) }}">
															<img src="{{ route('web.theme_banner', ['theme_id' => encrypt($item->id)]) }}" alt=""  style="height: 300px; width: auto;object-fit: cover;" />
															<img class="secondary-img" src="{{  route('web.theme_banner', ['theme_id' => encrypt($item->id)]) }}" alt=""  style="height: 300px; width: auto;object-fit: cover;" />
														</a>
														<span class="tag-line">new</span>
														<div class="product-action">
															<div class="button-cart">
																<button><a href="{{ route('web.theme_product', ['theme_id' => encrypt($item->id), 'sort_by' => encrypt(1)]) }}" style="color: blue;">{{ $item->theme }}</a></button>
															</div>
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
		<!-- shop-area end -->
@endsection
