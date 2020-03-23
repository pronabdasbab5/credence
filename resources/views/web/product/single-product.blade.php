  @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- Main Container -->
    <section class="main-container col1-layout">
      <div class="main">
        <div class="container">
          <div class="row">
            <div class="col-main">
              <div class="product-view">
                <div class="product-essential">
                  <form action="#" method="post" id="product">
                    <div class="product-img-box col-lg-5 col-sm-6 col-xs-12">
                      <div class="new-label new-top-left"> New </div>
                      <div class="product-image">
                        <div class="product-full"> <img id="product-zoom" src="web/images/products/img05.jpg" data-zoom-image="web/images/products/img05.jpg" alt="product-image"/> </div>
                        <div class="more-views">
                          <div class="slider-items-products">
                            <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                              <div class="slider-items slider-width-col4 block-content">
                                <div class="more-views-items"> <a href="#" data-image="web/images/products/img02.jpg" data-zoom-image="web/images/products/img02.jpg"> <img id="product-zoom"  src="web/images/products/img02.jpg" alt="product-image"/> </a></div>
                                <div class="more-views-items"> <a href="#" data-image="web/images/products/img03.jpg" data-zoom-image="web/images/products/img03.jpg"> <img id="product-zoom"  src="web/images/products/img03.jpg" alt="product-image"/> </a></div>
                                <div class="more-views-items"> <a href="#" data-image="web/images/products/img04.jpg" data-zoom-image="web/images/products/img04.jpg"> <img id="product-zoom"  src="web/images/products/img04.jpg" alt="product-image"/> </a></div>
                                <div class="more-views-items"> <a href="#" data-image="web/images/products/img05.jpg" data-zoom-image="web/images/products/img05.jpg"> <img id="product-zoom"  src="web/images/products/img05.jpg" alt="product-image"/> </a> </div>
                                <div class="more-views-items"> <a href="#" data-image="web/images/products/img06.jpg" data-zoom-image="web/images/products/img06.jpg"> <img id="product-zoom"  src="web/images/products/img06.jpg" alt="product-image" /> </a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end: more-images --> 
                    </div>
                    <div class="product-shop col-lg-7 col-sm-6 col-xs-12">
                      <div class="product-name">
                        <h1>Lorem ipsum dolor sit amet</h1>
                      </div>
                      <div class="price-block">
                        <div class="price-box">
                          <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> $599.99 </span> </p>
                          <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $499.99 </span> </p>
                        </div>
                      </div>
                      <div class="info-orther">
                        <p>Item Code: #12345678</p>
                        <p>Availability: <span class="in-stock">In stock</span></p>
                      </div>
                      <div class="short-description">
                        <h2>Quick Overview</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. </p>
                      </div>
                      <div class="form-option">
                        <p class="form-option-title">Available Options:</p>
                        <div class="attributes">
                          <div class="attribute-label">Color:</div>
                          <div class="attribute-list">
                            <ul class="list-color" id="list-color">
                              <li class="col-sel color-sel">
                                <span style="background:#db7878;"></span>
                                <input type="radio" name="product_color_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel color-sel selected">
                                <span style="background:#d91899;"></span>
                                <input type="radio" name="product_color_id" value="14" hidden="">
                              </li>
                            </ul>
                          </div>
                        </div>                      
                        <div class="attributes">
                          <div class="attribute-label">Size:</div>
                          <div class="attribute-list">
                            <ul class="list-size" id="list-size">
                              <li class="col-sel size-sel">
                                <span>XS</span>
                                <input type="radio" name="product_size_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel size-sel">
                                <span>S</span>
                                <input type="radio" name="product_size_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel size-sel">
                                <span>M</span>
                                <input type="radio" name="product_size_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel size-sel selected">
                                <span>L</span>
                                <input type="radio" name="product_size_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel size-sel">
                                <span>XL</span>
                                <input type="radio" name="product_size_id" value="13" checked="" hidden="">
                              </li>
                              <li class="col-sel size-sel">
                                <span>XXL</span>
                                <input type="radio" name="product_size_id" value="14" hidden="">
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="add-to-box">
                          <div class="add-to-cart" >
                            <div class="pull-left">
                              <div class="custom pull-left">
                                <label>Qty :</label>
                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                              </div>
                            </div>
                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button">Add to Cart</button>
                          </div>
                          <div class="email-addto-box">
                            <ul class="add-to-links">
                              <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
              <div class="block-title">
                <h2>Product Detail</h2>
              </div>
              <div class="add_info">
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                      <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main Container End --> 
    
    <!-- Related Products Slider -->  
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
                <div class="item" onclick="window.location='single_product.html';">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="#" class="product-image" title="Product Title Here" href="#"> <img alt="Product Title Here" src="web/images/products/img05.jpg"> </a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
                            <a class="link-wishlist" href="wishlist.html"><i class="icon-heart icons"></i><span class="hidden">Wishlist</span></a>
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
    <!-- Related Products Slider End --> 
  
  @endsection

  @section('script') 
    <!--cloud-zoom js --> 
    <script type="text/javascript" src="web/js/cloud-zoom.js"></script>

    <script>
      $(document).on('click','#list-color li',function(){
          $(this).addClass('selected').siblings().removeClass('selected')
      });

      $('.color-sel').click(function() {
        $('.color-sel').removeClass('selected');
        $(this).addClass('selected').find('input').prop('checked', true)    
      });
    </script>

    <script>
      $(document).on('click','#list-size li',function(){
          $(this).addClass('selected').siblings().removeClass('selected')
      });

      $('.size-sel').click(function() {
        $('.size-sel').removeClass('selected');
        $(this).addClass('selected').find('input').prop('checked', true)    
      });
    </script>
  @endsection
