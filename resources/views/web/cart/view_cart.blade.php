
  @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- JTV Home Slider -->
    <section class="main-container col2-left-layout">
      <div class="container-fluid">
         @if(!empty($cart_data) && (count($cart_data) > 0))
        <div class="row">
          <div class="col-sm-9">
            <article class="col-main" style="width: 100%;">              
              <div class="ordernav" style="padding-bottom: 0.8%;">
                  <ul>
                    <li class="step"><div>Cart information</div></li>
                    <li><div>shipping information</div></li>
                    <li><div>Order confirmation</div></li>
                  </ul>
              </div>
              <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div class="row singleorder">
                           
                                @php
                                    $total = 0;
                                @endphp
                            @foreach($cart_data as $key => $item)
                            <div class="row">
                                <div class="col-md-2 singleorderimg">
                                    <a href="{{ route('web.product_detail', ['slug' => $item['slug'], 'product_id' => $item['product_id']]) }}"><img src="{{ asset('assets/product_images/'.$item['banner'].'') }}" alt=""></a>
                                </div>
                                <div class="col-md-10 singleordercontent"><a href="{{ route('web.product_detail', ['slug' => $item['slug'], 'product_id' => $item['product_id']]) }}">{{ $item['product_name'] }}</a>
                                    <div class="cart-price" style="text-align: left;">
                                        <div class="quantity">
                                          <p>
                                            @if (!empty($item['discount']))
                                                @php
                                                    $discount_amount = ($item['price'] * $item['discount']) / 100;
                                                    $amount = ($item['price'] - $discount_amount);

                                                    $total = $total + ($amount * $item['quantity']);
                                                @endphp
                                                <small>
                                                    ₹{{ $item['price'] }}
                                                </small> 
                                                ₹{{ $amount }}  
                                            @else
                                                ₹{{ $item['price'] }}

                                                @php
                                                    $total = $total + ($item['price'] * $item['quantity']);
                                                @endphp
                                            @endif
                                            
                                        </p> <b>|</b> 
                                            @if(session()->has('msg'.$item['product_id']))
                                                <span style="color: red">{{ session()->get('msg'.$item['product_id']) }}</span>
                                            @endif
                                            <form action ="{{ route('web.update_cart') }}" method="POST" autocomplete="off">
                                                @csrf
                                          <label class="hidden-xs" style="margin-bottom: 0;">Quantity:</label>&nbsp;&nbsp;
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                          <input type="text" class="input-text qty" title="Qty" value="{{ $item['quantity'] }}" maxlength="12" id="qty" name="qty">
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                          <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                          <button type="submit" class="editproduct oth">Update</button>
                                      </form>
                                        </div>                                      
                                    </div>
                                    <div class="varient">
                                        @if(!empty($item['color_code']))
                                      <b class="sub-tag">Color : <span style="background: {{ $item['color_code'] }}"></span></b>
                                      @endif
                                      @if(!empty($item['size']))
                                      <b class="sub-tag spl">Size : {{ $item['size'] }} </b>
                                      @endif
                                    </div>
                                </div>
                                <div class="col-md-12" style=""><hr style="margin: 0"></div>
                                <div class="col-md-12 singleordercontent" style="padding: 10px 15px;">                                
                                    
                                    <a href="{{ route('web.add_wish_list', ['product_id' => $item['product_id']]) }}" class="editproduct">Move to whishlist</a>
                                    <a href="{{ route('web.remove_cart_item', ['product_id' => $item['product_id']]) }}" class="editproduct oth">Remove</a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                  </div>
              </div>
            </article>
            <!--  ///*///======    End article  ========= //*/// --> 
          </div>
          <div class="sidebar col-sm-3 col-xs-12">
            <aside class="sidebar">
              <div class="block-title">PAYMENT INFORMATION</div>
              <div class="cartcalculation">
                <div class="paymttotal">
                  <h4 style="text-align: left;">Cart Amount  </h4>
                  <h4 style="text-align: right;" id="total">
                    ₹{{ $total }}
                  </h4>
                </div>
                <div class="paymttotal" style="float: right;margin-top: 10px">
                    <a href="{{route('web.checkout.checkout')}}" class="button button--aylen btn">Proceed to Checkout</a>
                </div>
              </div>
            </aside>
          </div>
        </div>
        @else
              <center>
                <div class="emptycrt">
                  <img src="{{ asset('web/images/no-product.jpg') }}" alt="">
                    <p style="margin: 10px 0 0">Cart is Empty</p>
                </div>
              </center>
        @endif
      </div>
    </section>
       
  @endsection

  @section('script')
  @endsection