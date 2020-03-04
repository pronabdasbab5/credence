<?php

Route::group(['namespace'=>'Web'],function(){
	Route::get('/', 'IndexController@index')->name('web.index');

	/** From SubCategory to Product **/
	Route::get('product-list/{sub_category_id}/{top_category_id}', 'IndexController@subCategoryProductList')->name('web.sub_category_product_list');

	/** From SubCategory, Size to Product **/
	Route::get('product-list-size/{sub_category_id}/{top_category_id}/{size_id}', 'IndexController@subCategorySizeProductList')->name('web.sub_category_size_product_list');

	/** From SubCategory, Size, Sorted By to Product **/
	Route::post('product-list-size-sorted-by/{sub_category_id}/{top_category_id}/{size_id}', 'IndexController@subCategorySizeSortedByProductList')->name('web.sub_category_size_sorted_by_product_list');

	/** Product List View **/
	Route::get('product-list-view/{sub_category_id}/{top_category_id}/{size_id}/{sorted_by}', 'IndexController@productListView')->name('web.product_list_view');

	/** Product Details **/
	Route::get('product-detail/{product_id}', 'IndexController@productDetail')->name('web.product_detail');

	/** Product Stock **/
	Route::post('checking-product-stock', 'IndexController@checkingProductStock')->name('web.checking_product_stock');

	/** Start of Cart Route **/

	/** Add Product to Cart **/
	Route::post('add-cart', 'CartController@addCart')->name('web.add_cart');
	/** View Cart **/
	Route::get('view-cart', 'CartController@viewCart')->name('web.view_cart');
	/** Remove Cart Item **/
	Route::get('remove-cart-item/{stock_id}', 'CartController@removeCartItem')->name('web.remove_cart_item');
	/** Update Cart **/
	Route::post('update-cart', 'CartController@updateCart')->name('web.update_cart');
	/** End of Cart Route **/

	/** Image URL Generate **/
    Route::get('product-banner-image/{product_id}', 'ProductController@bannerImage')->name('web.product_banner_image');
    Route::get('product-additional-image/{product_additional_img_id}', 'ProductController@productAdditionalImage')->name('web.product_additional_image');
    Route::get('brand-banner/{brand_id}', 'ProductController@brandBanner')->name('web.brand_banner');

    /** User Register **/
    Route::get('register', 'UsersController@showUserRegisterForm')->name('web.register');
    Route::post('register', 'UsersController@createUser');

    /** User Login Route */
	Route::get('login', 'UsersLoginController@showUserLoginForm')->name('web.login');
	Route::post('login', 'UsersLoginController@userLogin');
	
	/** User Logout **/
	Route::get('logout', 'UsersLoginController@logout')->name('web.logout');

	/** What New Product **/
	Route::get('whats-new/{sort_by}', 'IndexController@whatsNewProductList')->name('web.whats_new');
	/** What New Sorted By Product **/
	Route::post('whats-new-sort', 'IndexController@whatsNewProductSortList')->name('web.whats_new_sort');

	/** Theme **/
	Route::get('theme', 'IndexController@themeList')->name('web.theme');
	/** Theme Product **/
	Route::get('theme-product/{theme_id}/{sort_by}', 'IndexController@themeProductList')->name('web.theme_product');
	/** Theme Sorted By Product **/
	Route::post('theme-product-sort/{theme_id}', 'IndexController@themeProductSortList')->name('web.theme_product_sort');
	/** Theme URL Generate **/
	Route::get('theme-banner/{theme_id}', 'ProductController@themeBanner')->name('web.theme_banner');

	/** Brand Product **/
	Route::get('brand-product/{brand_id}/{sort_by}', 'IndexController@brandProductList')->name('web.brand_product');
	/** Brand Sorted By Product **/
	Route::post('brand-product-sort/{brand_id}', 'IndexController@brandProductSortList')->name('web.brand_product_sort');

	Route::group(['middleware'=>'auth:users'],function(){

		/** Checkout Page **/
		Route::get('checkout', 'CheckoutController@showCheckoutForm')->name('web.checkout');
		/** Place Order **/
		Route::post('place-order', 'CheckoutController@placeOrder')->name('web.place_order');
		/** Thank You Page **/
		Route::get('thankyou', 'CheckoutController@thankyou')->name('web.thankyou');

		/** Add Address **/
		Route::post('address', 'AddressController@addAddress')->name('web.add_address');

		/** Add Review **/
		Route::post('add-review', 'ReviewController@addReview')->name('web.add_review');

		/** Add to Wish List **/
		Route::get('add-wish-list/{product_id}', 'WishListController@addWishList')->name('web.add_wish_list');
		/** Wish List **/
		Route::get('wish-list', 'WishListController@wishList')->name('web.wish_list');
		/** Remove Wish List Item **/
		Route::get('remove-wish-list/{product_id}', 'WishListController@removeWishList')->name('web.remove_wish_list');

		/** My Orders History **/
		Route::get('my-order-history', 'OrdersController@myOrderHistory')->name('web.my_order_history');

		/** My Profile **/
		Route::get('my-profile', 'UsersController@myProfile')->name('web.my_profile'); 
		/** Update My Profile **/
		Route::post('update-my-profile', 'UsersController@updateMyProfile')->name('web.update_my_profile');
	});
});
?>