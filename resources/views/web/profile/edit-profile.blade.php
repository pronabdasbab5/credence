  @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- JTV Home Slider -->
    <div class="main-container col2-right-layout profile">
      <div class="main container">
        <div class="row">
          <section class="col-sm-9">
            <div class="col-main">
              <div class="page-title">
                <h2>EDIT profile</h2>
              </div>
              <div class="static-contain account-login">
                <form action="http://assamproducts.webinfotechghy.xyz/registration" autocomplete="off">
                  <ul class="form-list">
                    <li>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Name <span class="required">*</span></label>
                                <br>
                                <input type="text" name="name" value="" class="input-text required-entry" required="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <br>
                                <input type="email" class="input-text required-entry" value="" name="email" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Phone Number <span class="required">*</span></label>
                                <br>
                                <input type="number" class="input-text required-entry" value="" name="contact_no">

                            </div>
                        </div>
                    </li>
                  </ul>
                  <p class="required">* Required Fields</p>
                  <div class="buttons-set">
                      <a href="{{route('web.profile.profile')}}" class="button button1" style="padding: 4px 12px;border-width: 1px;">Back</a>
                      <button id="send2" name="send" type="submit" class="button login"><span>save</span></button>
                  </div>
                </form>
              </div>
            </div>
          </section>
          <aside class="col-right sidebar col-sm-3 wow">
            <div class="block block-company">
              <div class="block-title" style="padding-left: 13px;">Account </div>
              <div class="block-content">
                <ol id="recently-viewed-items">
                  <li class="item odd"><a href="cart.php">Cart</a></li>
                  <li class="item odd"><a href="wishlist.php">Wishlist</a></li>
                  <li class="item  odd"><a href="#">My Orders</a></li>
                  <li class="item odd"><a href="profile.php">My Profile</a></li>
                  <li class="item odd"><a href="address.php">My Address</a></li>
                  <li class="item last"><a href="change-password.php">Change password</a></li>
                </ol>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
       
  @endsection

  @section('script')
  @endsection