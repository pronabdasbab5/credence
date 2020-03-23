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
                <h2>My profile</h2>
              </div>
              <div class="static-contain">
                <h2>Vishal Nag</h2><hr>
                <div class="row">
                  <div class="col-xs-6">
                    <p><strong>Email : </strong>imdemo@example.com</p> 
                  </div>
                  <div class="col-xs-6"> 
                    <p><strong>Phone : </strong>9872****45</p>
                  </div>
                  <div class="col-xs-12"> 
                    <p><strong>Address : </strong>424B Tobe Villa, ZXCY Place, Nowhere, Boston</p>
                  </div>
                  <div class="col-xs-6"> 
                    <a href="#" class="chngpas">Change Password</a>
                  </div>
                  <div class="col-xs-12"><hr></div>
                  <div class="col-xs-6">
                    <label class="hidden-xs">You can edit your profile</label><br>
                    <a href="{{route('web.profile.edit-profile')}}" class="button button--aylen btn">EDIT PROFILE</a>
                  </div>
                  <div class="col-xs-6">
                    <label class="hidden-xs">Check your saved shipping address</label><br>
                    <a href="{{route('web.address.address')}}" class="button button--aylen btn">SAVED ADDRESS</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <aside class="col-right sidebar col-sm-3 wow">
            <div class="block block-company">
              <div class="block-title" style="padding-left: 13px;">Account </div>
              <div class="block-content">
                <ol id="recently-viewed-items">
                  <li class="item odd"><a href="{{route('web.checkout.cart')}}">Cart</a></li>
                  <li class="item odd"><a href="{{route('web.wishlist.wishlist')}}">Wishlist</a></li>
                  <li class="item  odd"><a href="{{route('web.order.order')}}">My Orders</a></li>
                  <li class="item odd"><a href="{{route('web.profile.edit-profile')}}">Edit Profile</a></li>
                  <li class="item odd"><a href="{{route('web.address.address')}}">My Address</a></li>
                  <li class="item last"><a href="{{route('web.profile.change-password')}}">Change password</a></li>
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