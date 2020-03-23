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
          <div class="col-sm-12">
            <article class="col-main" style="width: 100%;">
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
                              <h5 class="text-center">Saved Address</h5>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>784, Rose Garden, Downtown</p>
                                    <p>Guwahati, ASSAM</p>
                                    <p>Pincode: 784125</p>
                                    <p>Phone: 4565456233 | Email: im@vsishal.com</p>
                                    <a href="{{route('web.address.edit-address')}}" title="">EDIT THIS ADDRESS</a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>56B, XYZ Colony</p>
                                    <p>Kolkata, WEST BENGAL</p>
                                    <p>Pincode: 784125</p>
                                    <p>Phone: 4565456233 | Email: im@vsishal.com</p>
                                    <a href="{{route('web.address.edit-address')}}" title="">EDIT THIS ADDRESS</a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-1">
                                <div class="single-address flex">
                                  <div class="single-address-content">
                                    <p>Vishal Nag</p>
                                    <p>784, B town, Domvali</p>
                                    <p>Mumbai, MAHARASTRA</p>
                                    <p>Pincode: 784125</p>
                                    <p>Phone: 4565456233 | Email: im@vsishal.com</p>
                                    <a href="{{route('web.address.edit-address')}}" title="">EDIT THIS ADDRESS</a>
                                  </div>
                                </div>
                              </div>
                              <div class="manage_add" onclick="myFunction()"><h5 class="text-center">Add New Shipping Addresses</h5> </div>
                            </div>
                            <div class="checkout-page" id="add-address" style="display: none;">
                              <h5 class="text-center">Add New Address</h5>   
                              <div class="box-border">
                              <form method="POST" action="#" autocomplete="off">
                                <input type="hidden" name="_token" value="SbcrwxGNI8nsUjuCOLRqrFVYCwSHDcTxbYEnbBCi">
                                <ul>
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
                                    <button onclick="myFunction()" class="button button1" type="button">Cancel</button>
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

