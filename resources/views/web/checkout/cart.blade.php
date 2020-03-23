  @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- JTV Home Slider -->
    <section class="main-container col2-left-layout">
      <div class="container-fluid">
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
                            <div class="row">
                                <div class="col-md-2 singleorderimg">
                                    <a href="#"><img src="web/images/products/img02.jpg" alt=""></a>
                                </div>
                                <div class="col-md-10 singleordercontent"><a href="#">Royal velvet</a>
                                    <div class="cart-price" style="text-align: left;">
                                        <div class="quantity">
                                          <p><small>₹1025</small> ₹1025 </p> <b>|</b> 
                                          <label class="hidden-xs" style="margin-bottom: 0;">Quantity:</label>&nbsp;&nbsp;
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                          <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                        </div>                                      
                                    </div>
                                    <div class="varient">
                                      <b class="sub-tag">Color : <span style="background: blue"></span></b>
                                      <b class="sub-tag spl">Size : L </b>
                                    </div>
                                </div>
                                <div class="col-md-12" style=""><hr style="margin: 0"></div>
                                <div class="col-md-12 singleordercontent" style="padding: 10px 15px;">                                
                                    <a href="#" class="editproduct">Move to whishlist</a>
                                    <a href="#" class="editproduct oth">Remove</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 singleorderimg">
                                    <a href="#"><img src="web/images/products/img02.jpg" alt=""></a>
                                </div>
                                <div class="col-md-10 singleordercontent"><a href="#">Royal velvet</a>
                                    <div class="cart-price" style="text-align: left;">
                                        <div class="quantity">
                                          <p><small>₹1025</small> ₹1025 </p> <b>|</b> 
                                          <label class="hidden-xs" style="margin-bottom: 0;">Quantity:</label>&nbsp;&nbsp;
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                          <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                        </div>                                      
                                    </div>
                                    <div class="varient">
                                      <b class="sub-tag">Color : <span style="background: blue"></span></b>
                                      <b class="sub-tag spl">Size : L </b>
                                    </div>
                                </div>
                                <div class="col-md-12" style=""><hr style="margin: 0"></div>
                                <div class="col-md-12 singleordercontent" style="padding: 10px 15px;">                                
                                    <a href="#" class="editproduct">Move to whishlist</a>
                                    <a href="#" class="editproduct oth">Remove</a>
                                </div>
                            </div>
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
                  <h4 style="text-align: right;" id="total">880</h4>
                </div>
                <div class="paymttotal" style="float: right;margin-top: 10px">
                    <a href="{{route('web.checkout.checkout')}}" class="button button--aylen btn">Proceed to Checkout</a>
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