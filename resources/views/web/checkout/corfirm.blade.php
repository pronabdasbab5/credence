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
                    <li style="border-color: #323d61"><div>Cart information</div></li>
                    <li style="border-color: #323d61"><div>shipping information</div></li>
                    <li class="step"><div>Order confirmation</div></li>
                  </ul>
              </div>
              <div class="container-fluid">
                  <div class="row">
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-12">
                      <div class="orderconfim">
                        <svg class="checkmark1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>                           
                      </div>
                      <div class="col-md-7"> 
                        <label style="font-weight: 700">Order Detail</label>                       
                        <div class="row singleorder">
                          <div class="row">
                              <div class="col-md-2 singleorderimg">
                                  <a href="#"><img src="web/images/products/img02.jpg" alt=""></a>
                              </div>
                              <div class="col-md-10 singleordercontent" style="padding-top: 10px;">
                                <a href="#">Royal velvet</a>
                                <div class="cart-price" style="text-align: left;">
                                    <div class="quantity">
                                      <p><small>₹1025</small> ₹1025 </p> <b>|</b> 
                                      <label class="" style="margin-bottom: 0;">Quantity:</label>&nbsp;&nbsp;2
                                    </div>                                      
                                </div>
                                <div class="varient">
                                  <b class="sub-tag">Color : <span style="background: blue"></span></b>
                                  <b class="sub-tag spl">Size : L </b>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5"> 
                        <label style="font-weight: 700">Shipping</label>
                        <div class="single-address orderconfim">
                          <div class="single-address-content">
                            <p>Vishal Nag</p>
                            <p>56/C Nowhere ,Downtown, guwahati,Assam </p>
                            <p>Pincode: 784125</p>
                            <p>Phone: 4565456233 Email: im@vsishal.com</p>
                            <p></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12" style="display:flex;justify-content: center;margin-top: 30px">
                      <a href="{{route('web.index')}}" class="button button--aylen btn">Contonue Shopping</a>
                    </div>
                  </div>
              </div>
            </article>
            <!--  ///*///======    End article  ========= //*/// --> 
          </div>
          <div class="sidebar col-sm-3 col-xs-12">
            <aside class="sidebar">
              <div class="block-title" style="border-bottom: 0">PAYMENT INFORMATION</div>
              <div class="cartcalculation">
                <div class="paymttotal">
                  <h4 style="text-align: left;">Cart Amount  </h4>
                  <h4 style="text-align: right;" id="total">880</h4>
                </div>
                <div class="paymttotal">
                  <h4 style="text-align: left;">Shipping  </h4>
                  <h4 style="text-align: right;" id="total">30</h4>
                </div>
                <div class="paymttotal">
                  <h4 style="text-align: left;font-weight: 700;border-bottom:0;">Grand Total </h4>
                  <h4 style="text-align: right;font-weight: 700;border-bottom:0;" id="total">910</h4>
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