@extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- JTV Home Slider -->
    <div class="jtv-slideshow">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div id='jtv-rev_slider_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
              <div id='jtv-rev_slider' class='rev_slider fullwidthabanner'>
                <ul>
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='web/images/slider/slide-img1.jpg'><img src="web/images/slider/slide-img1.jpg" alt="slide-img" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                    <div class="info">
                      <div class='tp-caption jtv-sub-title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;max-width:auto;max-height:auto;white-space:nowrap;'><span>Fashion 2017</span> </div>
                      <div class='tp-caption jtv-large-title sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'><span>Look Book</span> </div>
                      <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>Lorem ipsum dolor sit amet, consectetur adipiscing.</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='#' class="jtv-shop-now-btn">Shop Now</a> </div>
                    </div>
                  </li>
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='web/images/slider/slide-img2.jpg'><img src="web/images/slider/slide-img2.jpg" alt="slide-img" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                    <div class="info">
                      <div class='tp-caption jtv-sub-title sft slide2  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;max-width:auto;max-height:auto;white-space:nowrap;padding-right:0px'><span>Designer Clothing</span> </div>
                      <div class='tp-caption jtv-large-title sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'>Trendy colletions</div>
                      <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>Best offer of the month top brands.</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='#' class="jtv-shop-now-btn">View colletion</a> </div>
                    </div>
                  </li>
                  
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='web/images/slider/slide-img3.jpg'><img src="web/images/slider/slide-img3.jpg" alt="slide-img" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                    <div class="info">
                      <div class='tp-caption jtv-sub-title sft slide2  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;max-width:auto;max-height:auto;white-space:nowrap;padding-right:0px'><span>Save up to 45% off</span> </div>
                      <div class='tp-caption jtv-large-title sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'>new season</div>
                      <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>Most Popular Ecommerce HTML Template.</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='#' class="jtv-shop-now-btn">Order now</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- end JTV Home Slider --> 

          
        </div>
      </div>
    </div>  

    <!-- our features -->
    <div class="our-features-box hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="feature-box first"> <i class="icon-plane icons"></i>
              <div class="content">
                <h3>Delivery Across Many Area</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="feature-box"> <i class="icon-earphones-alt icons"></i>
              <div class="content">
                <h3>Support 24/7 For Clients</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="feature-box"> <i class="icon-like icons"></i>
              <div class="content">
                <h3>100% Satisfaction Guarantee</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="feature-box last"> <i class="icon-tag icons"></i>
              <div class="content">
                <h3>Great Deals Discount</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Apprisal Slider -->
    <section>
      <div class="container">
        <div class="upsell-section">
          <div class="slider-items-products">
            <div class="upsell-block">
              <div class="jtv-block-inner">
                <div class="block-title">
                  <h2>New Apprisal</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div>
                    <img src="web/images/apprisal/home-banner1.jpg">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="upsell-products-slider2 product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                      <div class="item" onclick="window.location='{{route('web.product.single-product')}}">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a href="{{route('web.product.single-product')}}" class="product-image" title="Product Title Here"> <img alt="Product Title Here" src="web/images/products/img05.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="{{route('web.product.single-product')}}"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img06.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img05.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                                  </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img06.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cosmatic & Perfume Slider -->
    <section>
      <div class="container">
        <div class="upsell-section">
          <div class="slider-items-products">
            <div class="upsell-block">
              <div class="jtv-block-inner">
                <div class="block-title">
                  <h2>Cosmatic & Perfume Product</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="upsell-products-slider1 product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                      <div class="item" onclick="window.location='{{route('web.product.single-product')}}">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a href="{{route('web.product.single-product')}}" class="product-image" title="Product Title Here"> <img alt="Product Title Here" src="web/images/products/img08.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="{{route('web.product.single-product')}}"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img09.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img10.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                                  </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img08.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div>
                    <img src="web/images/apprisal/home-banner2.jpg">
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div>
                    <img src="web/images/apprisal/home-banner3.jpg">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="upsell-products-slider1 product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                      <div class="item" onclick="window.location='{{route('web.product.single-product')}}">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a href="{{route('web.product.single-product')}}" class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img03.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="{{route('web.product.single-product')}}"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img04.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img03.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                                  </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img04.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kraft Slider -->
    <section>
      <div class="container">
        <div class="upsell-section">
          <div class="slider-items-products">
            <div class="upsell-block">
              <div class="jtv-block-inner">
                <div class="block-title">
                  <h2>Kraft Product</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="upsell-products-slider2 product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid block-content">
                      <div class="item" onclick="window.location='{{route('web.product.single-product')}}">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a href="{{route('web.product.single-product')}}" class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img01.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="{{route('web.product.single-product')}}"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img02.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img01.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                                  </div>
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
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img02.jpg"> </a>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div>
                    <img src="web/images/apprisal/home-banner5.jpg">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- New Arrival Slider -->
    <section>
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
                  <div class="item" onclick="window.location='{{route('web.product.single-product')}}">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a href="{{route('web.product.single-product')}}" class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img05.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="{{route('web.product.single-product')}}"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img03.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img02.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img04.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img01.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img06.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img07.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img08.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img09.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img10.jpg"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product Title Here" href="#"> Product Title Here </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                              </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    

     <!-- Special Product slider -->  
    <section class="special-products">
      <div class="container">
        <div class="grocery-banner">
          <a href="">
            <img src="web/images/apprisal/home-banner4.jpg">
          </a>
        </div>
      </div>
    </section>
       
  @endsection

  @section('script')
    <!-- rev-slider js --> 
    <script type="text/javascript" src="{{asset('web/js/rev-slider.js')}}"></script> 
    <script type='text/javascript'>
      jQuery(document).ready(function() {
      jQuery('#jtv-rev_slider').show().revolution({
      dottedOverlay: 'none',
      delay: 5000,
      startwidth: 1140,
      startheight: 400,
      hideThumbs: 200,
      thumbWidth: 200,
      thumbHeight: 50,
      thumbAmount: 2,
      navigationType: 'thumb',
      navigationArrows: 'solo',
      navigationStyle: 'round',
      touchenabled: 'on',
      onHoverStop: 'on',
      swipe_velocity: 0.7,
      swipe_min_touches: 1,
      swipe_max_touches: 1,
      drag_block_vertical: false,
      spinner: 'spinner0',
      keyboardNavigation: 'off',
      navigationHAlign: 'center',
      navigationVAlign: 'bottom',
      navigationHOffset: 0,
      navigationVOffset: 20,
      soloArrowLeftHalign: 'left',
      soloArrowLeftValign: 'center',
      soloArrowLeftHOffset: 20,
      soloArrowLeftVOffset: 0,
      soloArrowRightHalign: 'right',
      soloArrowRightValign: 'center',
      soloArrowRightHOffset: 20,
      soloArrowRightVOffset: 0,
      shadow: 0,
      fullWidth: 'on',
      fullScreen: 'off',
      stopLoop: 'off',
      stopAfterLoops: -1,
      stopAtSlide: -1,
      shuffle: 'off',
      autoHeight: 'off',
      forceFullWidth: 'on',
      fullScreenAlignForce: 'off',
      minFullScreenHeight: 0,
      hideNavDelayOnMobile: 1500,
      hideThumbsOnMobile: 'off',
      hideBulletsOnMobile: 'off',
      hideArrowsOnMobile: 'off',
      hideThumbsUnderResolution: 0,
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      startWithSlide: 0,
      fullScreenOffsetContainer: ''
      });
      });
      </script> 
      <!-- Hot Deals Timer 1--> 
      <script type="text/javascript">
      var dthen1 = new Date("12/25/17 11:59:00 PM");
      start = "08/04/15 03:02:11 AM";
      start_date = Date.parse(start);
      var dnow1 = new Date(start_date);
      if (CountStepper > 0)
      ddiff = new Date((dnow1) - (dthen1));
      else
      ddiff = new Date((dthen1) - (dnow1));
      gsecs1 = Math.floor(ddiff.valueOf() / 1000);

      var iid1 = "countbox_1";
      CountBack_slider(gsecs1, "countbox_1", 1);
    </script> 

  @endsection