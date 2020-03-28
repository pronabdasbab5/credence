<?php

Route::group(['namespace'=>'Web'],function(){
	/** Index Router **/
	Route::get('/', 'IndexController@index')->name('web.index');
	/** Product Detail **/ 
	Route::get('product-detail/{slug}/{product_id}', 'ProductController@productDetail')->name('web.product_detail');
	/** Product List: No id means 0 **/ 
	Route::get('product-list/{slug}/{top_category_id}/{sub_category_id}/{last_category_id}/{sorted_by}', 'ProductController@productList')->name('web.product_list');
	/** AJAX Operations **/
	Route::get('product-search/{keyword}', 'ProductController@productSearch');

	/** Add Product to Cart **/
	Route::post('add-cart', 'CartController@addCart')->name('web.add_cart');
	/** View Cart **/
	Route::get('view-cart', 'CartController@viewCart')->name('web.view_cart');
	/** Remove Cart Item **/
	Route::get('remove-cart-item/{product_id}', 'CartController@removeCartItem')->name('web.remove_cart_item');
	/** Update Cart **/
	Route::post('update-cart', 'CartController@updateCart')->name('web.update_cart');
	
	/** Metal Product List **/ 
	Route::get('bell-brass-metal-product-list/{slug}/{sub_category_id}', 'ProductController@bellBrassProductList')->name('web.bell_brass_metal_product_list');
	/** Metal Product Detail **/ 
	Route::get('bell-brass-metal-product-detail/{slug}/{product_id}', 'ProductController@bellBrassProductDetail')->name('web.bell_brass_metal_product_detail');

	/** Metal Product Banner URL Generate **/
    Route::get('metal-product-banner/{product_id}', 'ProductController@metalBannerImage')->name('admin.metal_product_banner');
	/** Product Banner URL Generate **/
    Route::get('product-banner/{product_id}', 'ProductController@bannerImage')->name('admin.product_banner');

    /** User Registration Routes **/
    Route::get('registration-page', 'RegisterController@registrationPage')->name('user.registration_page');
    Route::get('registration', 'RegisterController@registration')->name('user.registration');

    /** User Login Route */
	Route::get('login', 'UsersLoginController@showUserLoginForm')->name('web.login');
	Route::post('login', 'UsersLoginController@userLogin');

	/** User Logout **/
	Route::get('logout', 'UsersLoginController@logout')->name('web.logout');

	/** User Forgot Password **/
	Route::get('forgot-pass-form', 'UsersLoginController@showForgotPasswordForm')->name('web.forgot_pass_form');
	Route::post('verfication-code', 'UsersLoginController@verficationCode')->name('web.verfication_code');
	Route::get('set-pass-form/{user_id}', 'UsersLoginController@showSetPasswordForm')->name('web.set_pass_form');
	Route::get('set-password/{user_id}', 'UsersLoginController@setPassword')->name('web.set_password');

	Route::group(['middleware'=>'auth:users'],function(){

		/** Checkout Page **/
		Route::get('checkout', 'CheckoutController@showCheckoutForm')->name('web.checkout');
		/** Place Order **/
		Route::put('place-order', 'CheckoutController@placeOrder')->name('web.place_order');
		/** Thank You Page On Online **/
		Route::get('pay-success/{order_id}', 'CheckoutController@paySuccess');
		/** Thank You Page On Cash **/
		Route::get('thank-you', 'CheckoutController@thankYou');

		/** Coupon Check **/
		Route::post('check-coupon', 'CheckoutController@checkCoupon')->name('web.check_coupon');

		/** Add Address **/
		Route::post('address', 'AddressController@addAddress')->name('web.add_address');
		/** Delete Address **/
		Route::get('delete-address/{address_id}', 'AddressController@deleteAddress')->name('web.delete_address');

		/** Add Review **/
		// Route::post('add-review', 'ReviewController@addReview')->name('web.add_review');

		/** Add to Wish List **/
		Route::get('add-wish-list/{product_id}', 'WishListController@addWishList')->name('web.add_wish_list');
		/** Wish List **/
		Route::get('wish-list', 'WishListController@wishList')->name('web.wish_list');
		/** Remove Wish List Item **/
		Route::get('remove-wish-list/{product_id}', 'WishListController@removeWishList')->name('web.remove_wish_list');

		/** My Orders History **/
		Route::get('order-history', 'OrdersController@orderHistory')->name('web.order_history');

		/** My Profile **/
		// Route::get('my-profile', 'UsersController@myProfile')->name('web.my_profile'); 
		/** Update My Profile **/
		// Route::post('update-my-profile', 'UsersController@updateMyProfile')->name('web.update_my_profile');
	});
});

//========= Product =========//

Route::get('/product-list', function () {
    return view('web.product.product-list');
})->name('web.product.product-list');

Route::get('/single-product', function () {
    return view('web.product.single-product');
})->name('web.product.single-product');

//========= user =========//

Route::get('/Login', function () {
    return view('web.user.login');
})->name('web.user.login');

Route::get('/Register', function () {
    return view('web.user.register');
})->name('web.user.register');

Route::get('/Forgot-password', function () {
    return view('web.user.forgot-password');
})->name('web.user.forgot-password');

Route::get('/Forgot-password/Change-password', function () {
    return view('web.user.forgot-change-password');
})->name('web.user.forgot-change-password');

//========= Address =========//

Route::get('/address', function () {
    return view('web.address.address');
})->name('web.address.address');

Route::get('/address/Edit', function () {
    return view('web.address.edit-address');
})->name('web.address.edit-address');

//========= profile =========//

Route::get('/Profile', function () {
    return view('web.profile.profile');
})->name('web.profile.profile');

Route::get('/Profile/Edit', function () {
    return view('web.profile.edit-profile');
})->name('web.profile.edit-profile');

Route::get('/Profile/Change-password', function () {
    return view('web.profile.change-password');
})->name('web.profile.change-password');

//========= checkout =========//

Route::get('/cart', function () {
    return view('web.checkout.cart');
})->name('web.checkout.cart');

Route::get('/Checkout', function () {
    return view('web.checkout.checkout');
})->name('web.checkout.checkout');

Route::get('/Order-placed', function () {
    return view('web.checkout.corfirm');
})->name('web.checkout.corfirm');

//========= order =========//

Route::get('/Order', function () {
    return view('web.order.order');
})->name('web.order.order');

//========= wishlist =========//

Route::get('/Wishlist', function () {
    return view('web.wishlist.wishlist');
})->name('web.wishlist.wishlist');