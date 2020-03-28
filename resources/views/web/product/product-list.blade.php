 @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <style>.list-group {margin-bottom: 0}</style>
    <!-- JTV Home Slider -->
    <section class="main-container col2-left-layout">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 col-sm-push-3">
            <article class="col-main" style="width: 100%;">              
              <div class="toolbar toolbar-top" style="padding-bottom: 0.8%;border-bottom: 1px solid #ddd">
                <div class="row">
                  <div class="col-md-7 col-sm-5">
                    <h2 class="page-heading"> 
                      <span class="page-heading-title">

                        @if (isset($products[0]->third_level_sub_category_name))
                          @php
                            $product_label = $products[0]->third_level_sub_category_name;
                          @endphp
                        @elseif (isset($products[0]->sub_cate_name))
                          @php
                            $product_label = $products[0]->sub_cate_name;
                          @endphp
                        @else
                          @php
                            $product_label = $products[0]->top_cate_name;
                          @endphp
                        @endif

                        {{ $product_label }}
                      </span> 
                    </h2>
                  </div>
                  <div class="col-sm-5 text-right sort-by">
                    <label class="control-label" for="input-sort">Sort By:</label>
                    <select name="">
                      <option value="">Newest</option>
                      <option value="">Popularty</option>
                      <option value="">Price low to high</option>                      
                      <option value="">Price high to low</option>
                    </select>
                  </div>
                </div>
              </div>
              @if(!empty($products) && (count($products) > 0))
              <div id="product_container">
                <div class="category-products">
                  <ul class="products-grid row">
                    @foreach($products as $key => $item) 
                    <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="{{ $item->product_name }}" href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"> <img alt="{{ $item->product_name }}" src="{{ asset('assets/product_images/'.$item->banner.'') }}"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="{{ $item->product_name }}" href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"> {{ $item->product_name }} </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> 
                                    <span class="price">
                                      @if (!empty($item->discount))
                                        @php
                                          $discount_amount = ($item->price * $item->discount) / 100;
                                          $amount = ($item->price - $discount_amount);
                                        @endphp
                                       <span class="old-price"> ₹{{ $item->price }}</span>
                                       <span class="special-price">₹{{ $amount }}</span>
                                      @else
                                        <span class="special-price">₹{{ $item->price }}</span>
                                      @endif
                                    </span> </span> </div>
                                </div>
                                <div class="action">
                                  <a class="link-wishlist" href="{{ route('web.add_wish_list', ['product_id' => encrypt($item->id)]) }}"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
                                  <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="toolbar">
                  <div class="row">
                    <div class="col-sm-6 text-left">
                      <ul class="pagination">
                        {{ $products->links() }}
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </article>
            <!--  ///*///======    End article  ========= //*/// --> 
          </div>
          <div class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <aside class="sidebar">
              <div class="block-title">Shop By Catagories</div>
              <div class="block block-layered-nav">
                <div class="block-content" id="sidebar">
                  	<p class="block-subtitle">Shopping Options</p> 
	                <div class="list-group">
                    <a href="#menu5" class="list-group-item ji collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false">
                      <span class="hidden-sm-down">Apparelnew</span> 
                    </a>
                    <div class="sub-cat-1 list-group-item ji collapsed" id="menu5" href="#menu5a" data-toggle="collapse" data-parent="#sidebar" style="height: 0px;" aria-expanded="false">
	                    <a class="list-group-item" data-parent="#menu5"><span class="hidden-sm-down">Men<i class="fa fa-angle-down"></i></span></a>
	                    <div class="sub-cat collapse" id="menu5a" aria-expanded="false">
		                    <a href="#" class="list-group-item" data-parent="#menu5a">Topware</a>			                    
		                    <a href="#" class="list-group-item" data-parent="#menu5a">Bottomware</a>
			                </div>
	                    <a href="#" class="list-group-item" data-parent="#menu1">Women</a>
	                </div>
                      
                    </div>
                  @if(!empty($categories) && (count($categories) > 0))
                    @php
                      $collapse_id = 0;
                    @endphp
                    @foreach($categories as $key => $item)   
                      @php
                        $collapse_id++;
                      @endphp           
                    <div class="list-group">

                      @if(!empty($item['sub_categories']) && (count($item['sub_categories']) > 0))
                        <a href="#menu{{ $collapse_id }}" class="list-group-item ji" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false">
                          <span class="hidden-sm-down">{{ $item['top_cate_name'] }}</span> 
                        </a>
                        <div class="collapse sub-cat" id="menu{{ $collapse_id }}" style="border-bottom: 1px solid rgb(221, 221, 221);}">
                        @foreach($item['sub_categories'] as $keys => $items) 
                            <a href="{{ route('web.product_list', ['slug' => $items->sub_cate_name, 'top_category_id' => $item['top_category_id'], 'sub_category_id' => $items->id, 'last_category_id' => 0, 'sorted_by' => 0]) }}" class="list-group-item" data-parent="#menu{{ $collapse_id }}">{{ $items->sub_cate_name }}</a>
                        @endforeach
                        </div>
                      @else
                        <a class="list-group-item ji" href="{{ route('web.product_list', ['slug' => $item['top_cate_name'], 'top_category_id' => $item['top_category_id'], 'sub_category_id' => 0, 'last_category_id' => 0, 'sorted_by' => 0]) }}"><span class="hidden-sm-down">{{ $item['top_cate_name'] }}</span></a>
                      @endif

                    </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
        
  @endsection

  @section('script')
  @endsection