<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Credence - Best of Online Shopping</title>

  <!-- Mobile specific metas  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('web/images/fab.png')}}">

  <!-- CSS Style -->
  <link rel="stylesheet" href="{{asset('web/css/link-style.css')}}">
  <link rel="stylesheet" href="">
  @yield('seo')
</head>

<body class="cms-index-index cms-home-page">

  <!-- mobile menu -->
  <div id="jtv-mobile-menu">
    <ul>
      <li><a href="{{ route('web.index') }}">Home</a></li>
      @if(!empty($header_data['categories']) && (count($header_data['categories']) > 0))
        @foreach($header_data['categories'] as $key => $item)  
        @if(!empty($item['sub_categories']) && (count($item['sub_categories']) > 0))
      <li><a>{{ $item['top_cate_name'] }}</a>
        <ul>
            @foreach($item['sub_categories'] as $keys => $items) 
            @if (!empty($items->last_category) && (count($items->last_category) > 0))
          <li><a><span>{{ $items->sub_cate_name }}</span></a>
            <ul>
                @foreach($items->last_category as $keyss => $itemss) 
              <li> <a href="{{ route('web.product_list', ['slug' => $itemss->third_level_sub_category_name, 'top_category_id' => $item['top_category_id'], 'sub_category_id' => $items->id, 'last_category_id' => $itemss->id, 'sorted_by' => 0]) }}"> <span>{{ $itemss->third_level_sub_category_name }}</span> </a> </li>
              @endforeach
            </ul>
          </li>
          @else
          <li> <a href="{{ route('web.product_list', ['slug' => $items->sub_cate_name, 'top_category_id' => $item['top_category_id'], 'sub_category_id' => $items->id, 'last_category_id' => 0, 'sorted_by' => 0]) }}"> <span>{{ $items->sub_cate_name }}</span> </a> </li>
          @endif
          @endforeach
        </ul>
      </li>
      @else
      <li><a href="{{ route('web.product_list', ['slug' => $item['top_cate_name'], 'top_category_id' => $item['top_category_id'], 'sub_category_id' => 0, 'last_category_id' => 0, 'sorted_by' => 0]) }}">{{ $item['top_cate_name'] }}</a> </li>
      @endif
      @endforeach
    @endif
    </ul>
    <div class="jtv-top-link-mob">
      <ul class="links">
        <li><a title="Wishlist" href="{{ route('web.wish_list') }}">Wishlist</a> </li>
        <li><a title="Checkout" href="{{ route('web.view_cart') }}">Cart</a> </li>
        @auth('users')
        <li><a title="My Account" href="{{ route('web.my_profile') }}">My Account</a> </li>
        <li><a title="Checkout" href="{{ route('web.logout') }}">Logout</a> </li>
        @else
            <li class="last"><a title="Login" href="{{ route('web.login') }}"><span>Login</span></a> </li>
            <li class="last"><a title="Register" href="{{ route('web.registration_page') }}"><span>Register</span></a> </li>
        @endauth
      </ul>
    </div>
  </div>
  <!-- end mobile menu -->

  <div id="page"> 
    
    <!-- Header -->
    <header>
      <div class="header-container">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 srch">              
              <div class="mm-toggle-wrap" style="z-index: 9999999">
                <button class="mm-toggle1" id="this-togg"><i class="fa fa-search"></i></button>
              </div>
              <div class="search-box">
                <input type="text" placeholder="Search entire store here..." maxlength="70" name="search" id="search">
              </div>
              <div class="col-md-12" id="livesearch"> 
                <!-- if no product fount on search  --> 
                
              </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-11 jtv-logo-box"> 
              <!-- Header Logo -->
              <div class="logo"> <a title="eCommerce" href="{{route('web.index')}}"><h1>credence llpp</h1> </a> </div>
              <!-- End Header Logo --> 
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-1 jtv-top-xs">
              <div class="jtv-top-cart-box"> 
                <!-- Top Wishlist -->
                <div class="mini-cart">
                  <div class="basket1"> 
                    <a href="{{ route('web.wish_list') }}"> 
                      <span class="cart_count">
                        @if(!empty($header_data['wish_list_data']) && (count($header_data['wish_list_data']) > 0))
                          {{ count($header_data['wish_list_data']) }}
                        @else
                          0
                        @endif
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="jtv-top-cart-box"> 
                <!-- Top Cart -->
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> 
                    <a href="{{ route('web.view_cart') }}"> 
                        <span class="cart_count">
                        @if(!empty($header_data['cart_data']) && count($header_data['cart_data']) > 0)
                              {{ count($header_data['cart_data']) }}
                          @else
                              {{ 0 }}
                          @endif
                        </span>
                    </a> 
                </div>
                  <div>
                    <div class="jtv-top-cart-content"> 
                      
                      @if(!empty($header_data['cart_data']) && (count($header_data['cart_data']) > 0))
                      <ul class="mini-products-list" id="cart-sidebar">
                        @foreach($header_data['cart_data'] as $product_id => $item)
                        <li class="item first">
                          <div class="item-inner"> <a class="product-image" title="{{ $item['product_name'] }}" href="{{ route('web.product_detail', ['slug' => $item['slug'], 'product_id' => $item['product_id']]) }}" target="_blank"><img alt="{{ $item['product_name'] }}" src="{{ asset('assets/product_images/'.$item['banner'].'') }}"> </a>
                            <div class="product-details">
                              <div class="access"><a class="jtv-btn-remove" title="Remove This Item" href="{{ route('web.remove_cart_item', ['product_id' => $item['product_id']]) }}">Remove</a> </div>
                              <p class="product-name"><a href="{{ route('web.product_detail', ['slug' => $item['slug'], 'product_id' => $item['product_id']]) }}" target="_blank">{{ $item['product_name'] }}</a> </p>
                              <strong>{{ $item['quantity'] }}</strong> x <span class="price">
                                @if (!empty($item['discount']))
                                    @php
                                        $discount_amount = ($item['price'] * $item['discount']) / 100;
                                        $amount = ($item['price'] - $discount_amount);;
                                    @endphp
                                    ₹{{ $amount }}  
                                @else
                                    ₹{{ $item['price'] }}
                                @endif
                            </span> </div>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                      
                      
                      <div class="actions">
                        <button class="btn-checkout" title="Checkout" type="button" onClick="#"><span>Checkout</span> </button>
                        <a href="{{ route('web.view_cart') }}" class="view-cart"><span>View Cart</span></a> </div>
                        @else
                        <center>
                            <div class="emptycrt">
                              <img src="{{ asset('web/images/no-product.jpg') }}" alt="">
                                <p style="margin: 10px 0 0">Cart is Empty</p>
                            </div>
                        </center>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header --> 
    
    <!-- Navigation -->  
    <nav>
      <div class="container-fluid">
        <div class="mm-toggle-wrap">
          <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span> </div>
        </div>
        <div class="nav-inner"> 
          <!-- BEGIN NAV -->
          <ul id="nav" class="hidden-xs">
            <li class="drop-menu"><a href="{{route('web.index')}}" class="level-top active"><span>Home</span></a></li>    
            @if(!empty($header_data['categories']) && (count($header_data['categories']) > 0))
              @foreach($header_data['categories'] as $key => $item)        
              <li class="mega-menu"> 

                @if(!empty($item['sub_categories']) && (count($item['sub_categories']) > 0))
                  <a class="level-top"><span>{{ $item['top_cate_name'] }}</span></a>
                @else
                  <a class="level-top" href="{{ route('web.product_list', ['slug' => $item['top_cate_name'], 'top_category_id' => $item['top_category_id'], 'sub_category_id' => 0, 'last_category_id' => 0, 'sorted_by' => 0]) }}"><span>{{ $item['top_cate_name'] }}</span></a>
                @endif

                @if(!empty($item['sub_categories']) && (count($item['sub_categories']) > 0))
                <div class="jtv-menu-block-wrapper">
                  <div class="jtv-menu-block-wrapper2">
                    <div class="nav-block jtv-nav-block-center">
                      <ul class="level0">
                        @foreach($item['sub_categories'] as $keys => $items) 

                          @if (!empty($items->last_category) && (count($items->last_category) > 0))
                            <li class="parent item"> <a><span>{{ $items->sub_cate_name }}</span></a>
                          @else
                            <li class="parent item"> <a href="{{ route('web.product_list', ['slug' => $items->sub_cate_name, 'top_category_id' => $item['top_category_id'], 'sub_category_id' => $items->id, 'last_category_id' => 0, 'sorted_by' => 0]) }}"><span>{{ $items->sub_cate_name }}</span></a>
                          @endif

                          @if(!empty($items->last_category) && (count($items->last_category) > 0))
                          <ul class="level1">
                            @foreach($items->last_category as $keyss => $itemss) 
                              <li> <a href="{{ route('web.product_list', ['slug' => $itemss->third_level_sub_category_name, 'top_category_id' => $item['top_category_id'], 'sub_category_id' => $items->id, 'last_category_id' => $itemss->id, 'sorted_by' => 0]) }}"><span>{{ $itemss->third_level_sub_category_name }}</span></a> </li>
                            @endforeach
                          </ul>
                          @endif
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                @endif
              </li>
              @endforeach
            @endif
            <li class="mega-menu"> <a class="level-top" href="#"><span>Grocery</span></a> </li>
            @auth('users')
            <li class="drop-menu"> <a href="#"> <span>Welcome, {{Auth::guard('users')->user()->name}} <i class="fa fa-angle-down"></i></span> </a>
              <ul>
                <li> <a href="{{ route('web.wish_list') }}"> <span>Wishlist</span> </a> </li>
                <li><a href="{{route('web.order.order')}}"><span>My Orders</span></a> </li>
                <li><a href="{{ route('web.my_profile') }}"><span>My Profile</span></a> </li>
                <li><a href="{{route('web.address_list')}}"><span>My Address</span></a> </li>
                <li><a href="{{ route('web.logout') }}"><span>Logout</span></a> </li>
              </ul>
            </li>
            @else
            <li class="mega-menu"> <a class="level-top" href="{{route('web.login')}}"><span>Login</span></a> </li>
            <li class="mega-menu"> <a class="level-top" href="{{ route('web.registration_page') }}"><span>Register</span></a> </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    <!-- end nav --> 
