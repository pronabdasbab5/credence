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
                        {{ $label }}
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
                                  <a class="button btn-cart" type="button" title="" data-original-title="Add to Cart" href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><span>View Detail</span> </a>
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
              @else
                  <div style="background: #ffffff05; text-align: center;">
                    <img src="{{asset('web/images/not-found.jpg')}}" style="max-width: 100%"> <br>
                      <h4><strong>Sorry !!</strong> No Product Available...</h4>
                      <div class="action"><a href="{{ route('web.index') }}" type="button" class="button btn-cart"><span>Continue Shopping</span></a></div>
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
                    <ul class="cd-accordion-menu animated">
                      
                      <!-- For 3 Level Catagory -->
                      <li class="has-children">
                        <input type="checkbox" name="group-1" id="group-1">
                        <label for="group-1">APPAREL</label>
                        <ul>
                          <li class="has-children">
                            <input type="checkbox" name="sub-group-1" id="sub-group-1">
                            <label for="sub-group-1">MEN</label>
                            <ul>
                              <li><a href="#0">Topwear</a></li>
                              <li><a href="#0">Bottomwear</a></li>
                            </ul>
                          </li>
                          <li class="has-children">
                            <input type="checkbox" name="sub-group-2" id="sub-group-2">
                            <label for="sub-group-2">WOMEN</label>
                            <ul>
                              <li><a href="#0">Topwear</a></li>
                              <li><a href="#0">Bottomwear</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>

                      <!-- For 2 Level Catagory -->
                      <li class="has-children">
                        <input type="checkbox" name="group-4" id="group-4">
                        <label for="group-4">COSMETICS</label>
                        <ul>
                          <li><a href="#0">Men</a></li>
                          <li><a href="#0">Women</a></li>
                        </ul>
                      </li>

                      <!-- For Single Level Catagory -->
                      <li><a href="#0">PERFUMERIES</a></li>

                    </ul>
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