@extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- Main Container -->
    <section class="main-container col1-layout">
      <div class="main">
        <div class="container">
          <div class="row">
            <div class="col-main">
              <div class="product-view">
                <div class="product-essential">
                  <form action="#" method="post" id="product">
                    <div class="product-img-box col-lg-5 col-sm-6 col-xs-12">
                      <div class="new-label new-top-left"> New </div>
                      <div class="product-image">
                        <div class="product-full"> <img id="product-zoom" src="{{ asset('assets/product_images/'.$product_detail->banner.'') }}" data-zoom-image="{{ asset('assets/product_images/'.$product_detail->banner.'') }}" alt="product-image"/> </div>
                        <div class="more-views">
                          <div class="slider-items-products">
                            <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                              <div class="slider-items slider-width-col4 block-content">
                                @foreach ($product_slider_images as $key => $item)
                                <div class="more-views-items"> <a href="#" data-image="{{ asset('assets/product_images/'.$item->additional_image.'') }}" data-zoom-image="{{ asset('assets/product_images/'.$item->additional_image.'') }}"> <img id="product-zoom"  src="{{ asset('assets/product_images/'.$item->additional_image.'') }}" alt="product-image"/> </a></div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end: more-images --> 
                    </div>
                    <div class="product-shop col-lg-7 col-sm-6 col-xs-12">
                      <div class="product-name">
                        <h1>{{ $product_detail->product_name }}</h1>
                      </div>
                      <div class="price-block">
                        <div class="price-box">
                          @if (!empty($product_detail->discount))
                            @php
                              $discount_amount = ($product_detail->price * $product_detail->discount) / 100;
                              $amount = ($product_detail->price - $discount_amount);
                            @endphp
                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> ₹{{ $product_detail->price }} </span> </p>

                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> ₹{{ $amount }} </span> </p>
                          @else
                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> ₹{{ $product_detail->price }} </span> </p>
                          @endif
                        </div>
                      </div>
                      <div class="info-orther">
                        {{-- <p>Item Code: #12345678</p> --}}
                        <p>Availability: <span class="in-stock">
                          @if ($product_detail->stock > 0)
                            In Stock
                          @elseif(!empty($product_size_stock))
                            In Stock
                          @else
                            Out of Stock
                          @endif
                        </span></p>
                      </div>
                      {{-- <div class="short-description">
                        <h2>Quick Overview</h2>
                        <p>{{ $product_detail->desc }}</p>
                      </div> --}}
                      <div class="form-option">
                        <p class="form-option-title">Available Options:</p>

                        @if (!empty($product_color) && (count($product_color) > 0))
                        <div class="attributes">
                          <div class="attribute-label">Color:</div>
                          <div class="attribute-list">
                            <ul class="list-color" id="list-color">
                              @foreach ($product_color as $key => $item)
                                @if ($key == 0)
                                <li class="col-sel color-sel selected">
                                  <span style="background:{{ $item->color_code }};"></span>
                                  <input type="radio" name="product_color_id" value="{{ $item->id }}" checked="" hidden="">
                                </li>
                                @else
                                <li class="col-sel color-sel">
                                  <span style="background:{{ $item->color_code }};"></span>
                                  <input type="radio" name="product_color_id" value="{{ $item->id }}" hidden="">
                                </li>
                                @endif
                              @endforeach
                            </ul>
                          </div>
                        </div>  
                        @endif

                        @if (!empty($product_size_stock) && (count($product_size_stock) > 0))
                        <div class="attributes">
                          <div class="attribute-label">Size:</div>
                          <div class="attribute-list">
                            <ul class="list-size" id="list-size">
                              @foreach ($product_size_stock as $key => $item)
                                @if ($key == 0)
                                <li class="col-sel size-sel selected">
                                  <span>{{ $item->size }}</span>
                                  <input type="radio" name="product_size_id" value="{{ $item->id }}" checked="" hidden="">
                                </li>
                                @else 
                                <li class="col-sel size-sel">
                                  <span>{{ $item->size }}</span>
                                  <input type="radio" name="product_size_id" value="{{ $item->id }}" checked="" hidden="">
                                </li>
                                @endif
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        @endif

                        <div class="add-to-box">
                          <div class="add-to-cart" >
                            <div class="pull-left">
                              <div class="custom pull-left">
                                <label>Qty :</label>
                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                              </div>
                            </div>
                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button">Add to Cart</button>
                          </div>
                          <div class="email-addto-box">
                            <ul class="add-to-links">
                              <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
              <div class="block-title">
                <h2>Product Detail</h2>
              </div>
              <div class="add_info">
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p>{{ $product_detail->desc }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main Container End --> 

    @if (!empty($related_product) && (count($related_product) > 0))
    <!-- Related Products Slider -->  
    <div class="container">
      <div class="upsell-section">
        <div class="slider-items-products">
          <div class="upsell-block">
            <div class="jtv-block-inner">
              <div class="block-title">
                <h2>Lastest Arrival</h2>
              </div>
            </div>
            <div id="" class="upsell-products-slider product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 products-grid block-content">
                @foreach ($related_product as $key => $item)
                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}" class="product-image" title="{{ $item->product_name }}"> <img alt="{{ $item->product_name }}" src="{{ asset('assets/product_images/'.$item->banner.'') }}"> </a>
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
                                  ₹{{ $item->price }}
                                  ₹discount {{ $amount }}
                                @else
                                  ₹{{ $item->price }}
                                @endif
                              </span> </span> </div>
                          </div>
                          <div class="action">
                            <a class="link-wishlist" href="{{route('web.wishlist.wishlist')}}"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
                            <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Related Products Slider End --> 
    @endif
  
  @endsection

  @section('script') 
    <!--cloud-zoom js --> 
    <script type="text/javascript" src="web/js/cloud-zoom.js"></script>

    <script>
      $(document).on('click','#list-color li',function(){
          $(this).addClass('selected').siblings().removeClass('selected')
      });

      $('.color-sel').click(function() {
        $('.color-sel').removeClass('selected');
        $(this).addClass('selected').find('input').prop('checked', true)    
      });
    </script>

    <script>
      $(document).on('click','#list-size li',function(){
          $(this).addClass('selected').siblings().removeClass('selected')
      });

      $('.size-sel').click(function() {
        $('.size-sel').removeClass('selected');
        $(this).addClass('selected').find('input').prop('checked', true)    
      });
    </script>
  @endsection
