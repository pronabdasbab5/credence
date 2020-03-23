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
                    <li class="step"><div>shipping information</div></li>
                    <li><div>Order confirmation</div></li>
                  </ul>
              </div>
              <div class="container-fluid">
                  <div class="row">
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-12">
                        <div class="row">
                          <div class="box-account">
                            <div class="page-title">
                              <h2 class="text-center" style="padding: 0">Shipping Information</h2>
                            </div>                            
                            <div class="col2-set" id="select-address">
                              <h5 class="text-center">Select Address</h5>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <label class="radio-container">
                                    <input type="radio" checked="checked" name="address" value="9">
                                    <span class="checkmark"></span>
                                  </label>
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>guwahatil</p>
                                    <p>Phone: 4565456233</p>
                                    <p>Email: im@vsishal.com</p>
                                    <p>sdasdasd, sdSDSDSD</p>
                                    <p>Pincode: 784125</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <label class="radio-container">
                                    <input type="radio" checked="checked" name="address" value="9">
                                    <span class="checkmark"></span>
                                  </label>
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>guwahatil</p>
                                    <p>Phone: 4565456233</p>
                                    <p>Email: im@vsishal.com</p>
                                    <p>sdasdasd, sdSDSDSD</p>
                                    <p>Pincode: 784125</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <label class="radio-container">
                                    <input type="radio" checked="checked" name="address" value="9">
                                    <span class="checkmark"></span>
                                  </label>
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>guwahatil</p>
                                    <p>Phone: 4565456233</p>
                                    <p>Email: im@vsishal.com</p>
                                    <p>sdasdasd, sdSDSDSD</p>
                                    <p>Pincode: 784125</p>
                                  </div>
                                </div>
                              </div>
                              <div class="manage_add" onclick="myFunction()"><h5 class="text-center">Add New Shipping Addresses</h5> </div>
                            </div>
                            <div class="checkout-page" id="add-address" style="display: none;">
                              <h5 class="text-center">Add New Address</h5>   
                              <div class="box-border">
                              <form method="POST" action="http://assamproducts.webinfotechghy.xyz/address" autocomplete="off">
                                <input type="hidden" name="_token" value="SbcrwxGNI8nsUjuCOLRqrFVYCwSHDcTxbYEnbBCi">                      <ul>
                                  <li class="row">
                                    <div class="col-sm-6">
                                      <label for="first_name" class="required">Name</label>
                                      <input type="text" class="input form-control" name="name" id="name">
                                      <span id="name_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] -->
                                    <div class="col-sm-6">
                                      <label for="email_address" class="required">Email Address</label>
                                      <input type="email" class="input form-control" name="email" id="email_address">
                                      <span id="email_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] --> 
                                  </li>
                                  <!--/ .row -->
                                  <li class="row">
                                    <div class="col-xs-12">
                                      <label for="address" class="required">Address</label>
                                      <textarea class="input form-control form-area" name="address" id="address" rows="10"></textarea>
                                      <span id="address_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] --> 
                                    
                                  </li>
                                  <!-- / .row -->
                                  <li class="row">
                                    <div class="col-sm-6">
                                      <label for="telephone">Phone Number</label>
                                      <input type="number" name="contact_no" class="input form-control" id="telephone">
                                      <span id="telephone_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] -->
                                    <div class="col-sm-6">
                                      <label for="postal_code" class="required">Pincode</label>
                                      <input type="number" class="input form-control" name="pin_code" id="postal_code">
                                      <span id="postal_code_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] --> 
                                  </li>
                                  <!--/ .row -->
                                  
                                  <li class="row">
                                    <div class="col-sm-6">
                                      <label for="city" class="required">City</label>
                                      <input class="input form-control" type="text" name="city" id="city">
                                      <span id="city_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] -->
                                    
                                    <div class="col-sm-6">
                                      <label class="required">State/Province</label>
                                      <input type="text" class="input form-control" name="state" id="state">
                                      <span id="state_msg" style="color: red;"></span>
                                    </div>
                                    <!--/ [col] --> 
                                  </li>
                                  <!--/ .row -->
                                  <li>
                                    <button onclick="myFunction()" type="button" class="button button1">Cancel</button>
                                    <button type="submit" class="button" id="address_btn">Continue</button>
                                  </li>
                                </ul>
                                </form>
                              </div>
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
                  <h4 style="text-align: left;font-weight: 700">Grand Total </h4>
                  <h4 style="text-align: right;font-weight: 700" id="total">910</h4>
                </div>

                <div class="paymtmthd">
                  <label>Payment Methord *</label>
                  <label class="radio-container">
                    <input type="radio" name="payment_type" value="1" required checked class="payment_type_radio">
                    <span class="checkmark"></span>
                    Cash On Delivery
                  </label>
                  <label class="radio-container">
                    <input type="radio" name="payment_type" value="2" required class="payment_type_radio">
                    <span class="checkmark"></span>
                    Pay Online
                  </label> 
                </div>                                    
                <div class="paymttotal" style="float: right;margin-top: 10px">
                    <a href="{{route('web.checkout.corfirm')}}" class="button button--aylen btn">Proceed to Checkout</a>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
       
  @endsection

  @section('script')
    <script type="text/javascript">
      function myFunction() {
        var x = document.getElementById("add-address");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("select-address");
        if (y.style.display === "none") {
          y.style.display = "block";
        } else {
          y.style.display = "none";
        }
      }
      function myFunction1() {
        var x = document.getElementById("add-address");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("select-address");
        if (y.style.display === "none") {
          y.style.display = "block";
        } else {
          y.style.display = "none";
        }
      }
    </script>
  @endsection

