<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/frontend.php';

/** Admin Login Route */
Route::get('/admin/login', 'Admin\AdminLoginController@showAdminLoginForm')->name('admin.login');
Route::get('/register/admin', 'Admin\AdminRegisterController@showAdminRegisterForm')->name('admin.register');
Route::get('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

Route::post('/admin/login', 'Admin\AdminLoginController@adminLogin');
Route::post('/register/admin', 'Admin\AdminRegisterController@createAdmin');
/** End of Admin Login Route */

Route::group(['middleware'=>'auth:admin','prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

    Route::group(['namespace'=>'TopCategory'],function(){
    	Route::get('all-top-category', 'TopCategoryController@allTopCategory')->name('admin.all_top_category');
    	Route::get('edit-top-category/{topCategoryId}', 'TopCategoryController@showEditTopCategoryForm')->name('admin.edit_top_category');
    	Route::put('update-top-category/{topCategoryId}', 'TopCategoryController@updateTopCategory')->name('admin.update_top_category');
    });

    Route::group(['namespace'=>'GroceryTopCategory'],function(){
     
      Route::get('grocery-new-top-category','GroceryTopCategoryController@showTopCategoryForm')->name('admin.grocery_new_top_category');
     
      Route::put('grocery-add-top-category','GroceryTopCategoryController@addTopCategory')->name('admin.grocery_add_top_category');
    
      Route::get('all-grocery-top-category', 'GroceryTopCategoryController@allTopCategory')->name('admin.all_grocery_top_category');
     
      Route::get('show-grocery-edit-top-category-form/{grocerytopCategoryId}','GroceryTopCategoryController@showGroceryTopCategoryForm')->name('admin.show_edit_grocery_top_category_form');
      
      Route::put('update-grocery-top-category/{grocerytopCategoryId}','GroceryTopCategoryController@updateGroceryTopCategory')->name('admin.update_grocery_top_category');


    });
    Route::group(['namespace'=>'GrocerySubCategory'],function(){
     
     Route::get('show-grocery-sub-category','GrocerySubCategoryController@showGrocerySubCategoryForm')->name('admin.show-grocery-sub-category');
     
     Route::put('add-grocery-sub-category','GrocerySubCategoryController@addGrocerySubCategory')->name('admin.add-grocery-sub-category');
     
     Route::get('list-grocery-sub-category','GrocerySubCategoryController@listGrocerySubCategory')->name('admin.list-grocery-sub-category');

      Route::get('edit-grocery-sub-category/{subCategoryId}', 'GrocerySubCategoryController@showGroceryEditSubCategoryForm')->name('admin.edit_grocery_sub_category_form');

     Route::put('update-grocery-sub-category/{grocerySubCategoryId}', 'GrocerySubCategoryController@updateGrocerySubCategory')->name('admin.update_grocery_sub_category');
    });
     


     
 

    Route::group(['namespace'=>'SubCategory'],function(){
    	Route::get('new-sub-category', 'SubCategoryController@showSubCategoryForm')->name('admin.new_sub_category');
    	
        Route::put('add-sub-category', 'SubCategoryController@addSubCategory')->name('admin.add_sub_category');
    	
        Route::get('all-sub-category', 'SubCategoryController@allSubCategory')->name('admin.all_sub_category');
    	
        Route::get('edit-sub-category/{subCategoryId}', 'SubCategoryController@showEditSubCategoryForm')->name('admin.edit_sub_category');
    	
        Route::put('update-sub-category/{subCategoryId}', 'SubCategoryController@updateSubCategory')->name('admin.update_sub_category');
    });

    Route::group(['namespace'=>'ThirdLevelSubCategory'],function(){
        Route::get('new-third-level-sub-category', 'ThirdLevelSubCategoryController@showThirdLevelSubCategoryForm')->name('admin.new_third_level_sub_category');
        Route::put('add-third-level-sub-category', 'ThirdLevelSubCategoryController@addThirdLevelSubCategory')->name('admin.add_third_level_sub_category');
        Route::get('all-third-level-sub-category', 'ThirdLevelSubCategoryController@allThirdLevelSubCategory')->name('admin.all_third_level_sub_category');
        Route::get('edit-third-level-sub-category/{subCategoryId}', 'ThirdLevelSubCategoryController@showEditThirdLevelSubCategoryForm')->name('admin.edit_third_level_sub_category');
        Route::put('update-third-level-sub-category/{subCategoryId}', 'ThirdLevelSubCategoryController@updateThirdLevelSubCategory')->name('admin.update_third_level_sub_category');
    });

    Route::group(['namespace'=>'Size'],function(){
        Route::get('new-size', 'SizeController@showSizeForm')->name('admin.new_size');
        Route::post('add-size', 'SizeController@addSize')->name('admin.add_size');
        Route::get('all-size', 'SizeController@allSize')->name('admin.all_size');
        Route::get('edit-size/{sizeId}', 'SizeController@showEditSizeForm')->name('admin.edit_size');
       
        Route::post('update-size/{sizeId}', 'SizeController@updateSize')->name('admin.update_size');

        Route::get('new-mappping-size', 'SizeController@showMappingSizeForm')->name('admin.new_mappping_size');
        
        Route::post('add-mappping-size', 'SizeController@addMappingSize')->name('admin.add_mappping_size');
      
        Route::get('edit-mappping-size/{size_mapping_id}', 'SizeController@showEditMappingSizeForm')->name('admin.edit_mappping_size');
       
        Route::post('update-mappping-size/{size_mapping_id}', 'SizeController@updateMappingSize')->name('admin.update_mappping_size');
    });

    Route::group(['namespace'=>'GrocerySize'],function(){
   
    Route::get('grocery-new-size', 'GrocerySizeController@showGrocerySizeForm')->name('admin.grocery_new_size');

     Route::post('add-grocery-size', 'GrocerySizeController@addGrocerySize')->name('admin.add_grocery_size');

     Route::get('all-grocery-size', 'GrocerySizeController@allGrocerySize')->name('admin.all_grocery_size');

       Route::get('edit-grocery-size/{grocerysizeId}', 'GrocerySizeController@showEditGrocerySizeForm')->name('admin.edit_grocery_size');

       Route::post('update-grocery-size/{grocerysizeId}', 'GrocerySizeController@updateGrocerySize')->name('admin.update_grocery_size');

        Route::get('new-grocery-mappping-size', 'GrocerySizeController@showGroceryMappingSizeForm')->name('admin.new_grocery_mappping_size');

         Route::post('add-grocery-mappping-size', 'GrocerySizeController@addGroceryMappingSize')->name('admin.add_grocery_mapping_size');

           Route::get('edit-grocery-mappping-size/{size_mapping_id}', 'GrocerySizeController@showEditGroceryMappingSizeForm')->name('admin.edit_grocery_mappping_size');

           Route::post('update-mappping-size/{size_mapping_id}', 'GrocerySizeController@updateGroceryMappingSize')->name('admin.update_grocery_mappping_size');
      



    });



    Route::group(['namespace'=>'Color'],function(){
        Route::get('new-color', 'ColorController@showColorForm')->name('admin.new_color');
        Route::post('add-color', 'ColorController@addColor')->name('admin.add_color');
        Route::get('all-color', 'ColorController@allColor')->name('admin.all_color');
        Route::get('edit-color/{colorId}', 'ColorController@showEditColorForm')->name('admin.edit_color');
        Route::post('update-color/{colorId}', 'ColorController@updateColor')->name('admin.update_color');

        Route::get('new-mappping-color', 'ColorController@showMappingColorForm')->name('admin.new_mappping_color');
        Route::post('add-mappping-color', 'ColorController@addMappingColor')->name('admin.add_mappping_color');
        Route::get('edit-mappping-color/{color_mapping_id}', 'ColorController@showEditMappingColorForm')->name('admin.edit_mappping_color');
        Route::post('update-mappping-color/{color_mapping_id}', 'ColorController@updateMappingColor')->name('admin.update_mappping_color');
    });

    Route::group(['namespace'=>'Brand'],function(){
        Route::get('new-brand', 'BrandController@showBrandForm')->name('admin.new_brand');
        Route::put('add-brand', 'BrandController@addBrand')->name('admin.add_brand');
        Route::get('all-brand', 'BrandController@allBrand')->name('admin.all_brand');
        Route::get('edit-brand/{brand_id}', 'BrandController@showEditBrandForm')->name('admin.edit_brand');
        Route::put('update-brand/{brand_id}', 'BrandController@updateBrand')->name('admin.update_brand');
    });

    Route::group(['namespace'=>'GroceryBrand'],function(){
        Route::get('grocery-new-brand', 'GroceryBrandController@showGroceryBrandForm')->name('admin.grocery_new_brand');
        Route::put('add-grocery-brand', 'GroceryBrandController@addGroceryBrand')->name('admin.add_grocery_brand');
        Route::get('all-grocery-brand', 'GroceryBrandController@allGroceryBrand')->name('admin.all_grocery_brand');
        Route::get('edit-grocery-brand/{grocery_brand_id}', 'GroceryBrandController@showGroceryEditBrandForm')->name('admin.grocery_edit_brand');
         Route::put('update-grocery-brand/{grocery_brand_id}', 'GroceryBrandController@updateGroceryBrand')->name('admin.update_grocery_brand');




    });

    Route::group(['namespace'=>'GroceryProduct'],function(){
        
         Route::get('new-grocery-product', 'GrocerProductController@showGroceryProductForm')->name('admin.new_grocery_product');
          
          Route::put('add-grocery-product', 'GrocerProductController@addGroceryProduct')->name('admin.add_grocery_product');

          Route::get('grocery-product-stock-entry/{product_id}', 'GrocerProductController@groceryProductStockAmountEntry')->name('admin.grocery_product_stock_entry');

           Route::post('add-grocery-amount-stock-entry/{product_id}', 'GrocerProductController@addGroceryStockEntry')->name('admin.add_grocery_amount_stock_entry');

             Route::get('grocery-product-list', 'GrocerProductController@groceryProductList')->name('admin.grocery_product_list');

             Route::get('grocery-product-list-data', 'GrocerProductController@groceryProductListData')->name('admin.grocery_product_list_data');
            
            Route::get('edit-grocery-prouduct-banner/{product_id}', 'GrocerProductController@showEditGroceryProductBanner')->name('admin.edit_grocery_product_banner');

            Route::put('update-grocery-prouduct-banner/{product_id}', 'GrocerProductController@updateGroceryProductBanner')->name('admin.update_grocery_product_banner');

            Route::get('additional-grocery-prouduct-image-list/{product_id}', 'GrocerProductController@showGroceryProductImageList')->name('admin.additional_grocery_product_image_list');

            Route::put('update-grocery-prouduct-additional-Image/{product_id}', 'GrocerProductController@updateGroceryProductAdditionalImage')->name('admin.update_grocery_product_additional_image');




    });

    Route::group(['namespace'=>'Product'],function(){

        Route::group(['namespace'=>'Apparel'],function(){
            /** New Product **/
            Route::get('new-apparel-product', 'ApparelController@showProductForm')->name('admin.new_apparel_product');
            Route::put('add-apparel-product', 'ApparelController@addProduct')->name('admin.add_apparel_product');

            /** Stock Entry **/
            Route::get('product-stock-entry/{product_id}', 'ApparelController@productStockEntry')->name('admin.product_stock_entry');
            Route::post('add-stock-entry/{product_id}', 'ApparelController@addStockEntry')->name('admin.add_stock_entry');

            /** Products List **/
            Route::get('prouduct-apparel-list', 'ApparelController@productList')->name('admin.product_apparel_list');
            Route::post('prouduct-apparel-list-data', 'ApparelController@productListData')->name('admin.product_apparel_list_data');

            /** Product Banner Change **/
            Route::get('edit-apparel-prouduct-banner/{product_id}', 'ApparelController@showEditProductBanner')->name('admin.edit_apparel_product_banner');
            Route::put('update-apparel-prouduct-banner/{product_id}', 'ApparelController@updateProductBanner')->name('admin.update_apparel_product_banner');

            /** Product Additional Image **/
            Route::get('additional-apparel-prouduct-image-list/{product_id}', 'ApparelController@showProductImageList')->name('admin.additional_apparel_product_image_list');
            Route::put('update-apparel-prouduct-additional-image/{additional_image_id}', 'ApparelController@updateProductAdditionalImage')->name('admin.update_apparel_product_additional_image');

            /** Product View **/
            Route::get('view-apparel-product/{product_id}', 'ApparelController@viewProduct')->name('admin.view_apparel_product');

            /** Edit Product **/
            Route::get('edit-apparel-product/{product_id}', 'ApparelController@showEditProduct')->name('admin.edit_apparel_product');
            Route::put('update-apparel-product/{product_id}', 'ApparelController@updateProduct')->name('admin.update_apparel_product');

            /** Edit Product Size **/
            Route::get('edit-apparel-product-size/{product_id}', 'ApparelController@showEditProductSize')->name('admin.edit_apparel_product_size');
            Route::post('update-apparel-product-size/{product_id}', 'ApparelController@updateProductSize')->name('admin.update_apparel_product_size');

            /** Product Size Status **/
            Route::get('change-apparel-product-size-status/{product_mapping_id}/{status}', 'ApparelController@changeProductSizeStatus')->name('admin.change_apparel_product_size_status'); 

            /** Edit Product Color **/
            Route::get('edit-apparel-product-color/{product_id}', 'ApparelController@showEditProductColor')->name('admin.edit_apparel_product_color');
            Route::post('update-apparel-product-color/{product_id}', 'ApparelController@updateProductColor')->name('admin.update_apparel_product_color');

            /** Product Color Status **/
            Route::get('change-apparel-product-color-status/{product_mapping_id}/{status}', 'ApparelController@changeProductColorStatus')->name('admin.change_apparel_product_color_status'); 

            /** Product Update Stock **/
            Route::get('edit-apparel-product-stock/{product_id}', 'ApparelController@showEditProductStock')->name('admin.edit_apparel_product_stock');
            Route::post('update-apparel-product-stock/{product_id}', 'ApparelController@updateProductStock')->name('admin.update_apparel_product_stock');

            /** Product Status **/
            Route::get('change-apparel-product-status/{product_id}/{status}', 'ApparelController@changeProductStatus')->name('admin.change_apparel_product_status'); 

            /** Active and In-Active Products List **/
            Route::get('active-apparel-prouduct-list', 'ApparelController@activeProductList')->name('admin.active_apparel_product_list');
            Route::get('in-active-apparel-prouduct-list', 'ApparelController@inactiveProductList')->name('admin.in_active_apparel_product_list');
            Route::post('active-in-active-apparel-prouduct-list-data', 'ApparelController@activeInactiveProductListData')->name('admin.active_in_active_apparel_product_list_data');
        });

        Route::group(['namespace'=>'Cosmetics'],function(){
            /** New Product **/
            Route::get('new-cosmetics-product', 'CosmeticsController@showProductForm')->name('admin.new_cosmetics_product');
            Route::put('add-cosmetics-product', 'CosmeticsController@addProduct')->name('admin.add_cosmetics_product');

            /** Products List **/
            Route::get('prouduct-cosmetics-list', 'CosmeticsController@productList')->name('admin.product_cosmetics_list');
            Route::post('prouduct-cosmetics-list-data', 'CosmeticsController@productListData')->name('admin.product_cosmetics_list_data');

            /** Product Banner Change **/
            Route::get('edit-cosmetics-prouduct-banner/{product_id}', 'CosmeticsController@showEditProductBanner')->name('admin.edit_cosmetics_product_banner');
            Route::put('update-cosmetics-prouduct-banner/{product_id}', 'CosmeticsController@updateProductBanner')->name('admin.update_cosmetics_product_banner');

            /** Product Additional Image **/
            Route::get('additional-cosmetics-prouduct-image-list/{product_id}', 'CosmeticsController@showProductImageList')->name('admin.additional_cosmetics_product_image_list');
            Route::put('update-cosmetics-prouduct-additional-image/{additional_image_id}', 'CosmeticsController@updateProductAdditionalImage')->name('admin.update_cosmetics_product_additional_image');

            /** Product View **/
            Route::get('view-cosmetics-product/{product_id}', 'CosmeticsController@viewProduct')->name('admin.view_cosmetics_product');

            /** Edit Product **/
            Route::get('edit-cosmetics-product/{product_id}', 'CosmeticsController@showEditProduct')->name('admin.edit_cosmetics_product');
            Route::put('update-cosmetics-product/{product_id}', 'CosmeticsController@updateProduct')->name('admin.update_cosmetics_product');

            /** Product Status **/
            Route::get('change-cosmetics-product-status/{product_id}/{status}', 'CosmeticsController@changeProductStatus')->name('admin.change_cosmetics_product_status'); 
        });

        Route::group(['namespace'=>'Perfumeries'],function(){
            /** New Product **/
            Route::get('new-perfumeries-product', 'PerfumeriesController@showProductForm')->name('admin.new_perfumeries_product');
            Route::put('add-perfumeries-product', 'PerfumeriesController@addProduct')->name('admin.add_perfumeries_product');

            /** Products List **/
            Route::get('prouduct-perfumeries-list', 'PerfumeriesController@productList')->name('admin.product_perfumeries_list');
            Route::post('prouduct-perfumeries-list-data', 'PerfumeriesController@productListData')->name('admin.product_perfumeries_list_data');

            /** Product Banner Change **/
            Route::get('edit-perfumeries-prouduct-banner/{product_id}', 'PerfumeriesController@showEditProductBanner')->name('admin.edit_perfumeries_product_banner');
            Route::put('update-perfumeries-prouduct-banner/{product_id}', 'PerfumeriesController@updateProductBanner')->name('admin.update_perfumeries_product_banner');

            /** Product Additional Image **/
            Route::get('additional-perfumeries-prouduct-image-list/{product_id}', 'PerfumeriesController@showProductImageList')->name('admin.additional_perfumeries_product_image_list');
            Route::put('update-perfumeries-prouduct-additional-image/{additional_image_id}', 'PerfumeriesController@updateProductAdditionalImage')->name('admin.update_perfumeries_product_additional_image');

            /** Product View **/
            Route::get('view-perfumeries-product/{product_id}', 'PerfumeriesController@viewProduct')->name('admin.view_perfumeries_product');

            /** Edit Product **/
            Route::get('edit-perfumeries-product/{product_id}', 'PerfumeriesController@showEditProduct')->name('admin.edit_perfumeries_product');
            Route::put('update-perfumeries-product/{product_id}', 'PerfumeriesController@updateProduct')->name('admin.update_perfumeries_product');

            /** Product Status **/
            Route::get('change-perfumeries-product-status/{product_id}/{status}', 'PerfumeriesController@changeProductStatus')->name('admin.change_perfumeries_product_status'); 
        });

        Route::group(['namespace'=>'Krafts'],function(){
            /** New Product **/
            Route::get('new-krafts-product', 'KraftsController@showProductForm')->name('admin.new_krafts_product');
            Route::put('add-krafts-product', 'KraftsController@addProduct')->name('admin.add_krafts_product');

            /** Products List **/
            Route::get('prouduct-krafts-list', 'KraftsController@productList')->name('admin.product_krafts_list');
            Route::post('prouduct-krafts-list-data', 'KraftsController@productListData')->name('admin.product_krafts_list_data');

            /** Product Banner Change **/
            Route::get('edit-krafts-prouduct-banner/{product_id}', 'KraftsController@showEditProductBanner')->name('admin.edit_krafts_product_banner');
            Route::put('update-krafts-prouduct-banner/{product_id}', 'KraftsController@updateProductBanner')->name('admin.update_krafts_product_banner');

            /** Product Additional Image **/
            Route::get('additional-krafts-prouduct-image-list/{product_id}', 'KraftsController@showProductImageList')->name('admin.additional_krafts_product_image_list');
            Route::put('update-krafts-prouduct-additional-image/{additional_image_id}', 'KraftsController@updateProductAdditionalImage')->name('admin.update_krafts_product_additional_image');

            /** Product View **/
            Route::get('view-krafts-product/{product_id}', 'KraftsController@viewProduct')->name('admin.view_krafts_product');

            /** Edit Product **/
            Route::get('edit-krafts-product/{product_id}', 'KraftsController@showEditProduct')->name('admin.edit_krafts_product');
            Route::put('update-krafts-product/{product_id}', 'KraftsController@updateProduct')->name('admin.update_krafts_product');

            /** Product Status **/
            Route::get('change-krafts-product-status/{product_id}/{status}', 'KraftsController@changeProductStatus')->name('admin.change_krafts_product_status'); 
        });

        /** Image URL Generate **/
        Route::get('banner_image/{product_id}', 'ProductController@bannerImage')->name('admin.banner_image');
         Route::get('grocery_banner_image/{product_id}', 'ProductController@groceryBannerImage')->name('admin.grocery_banner_image');
        Route::get('additional_image/{additional_image_id}', 'ProductController@additionalImage')->name('admin.additional_image');
         Route::get('grocery_additional_image/{additional_image_id}', 'ProductController@groceryAdditionalImage')->name('admin.grocery_additional_image');  
  

        /** Ajax Route **/
        Route::post('retrive-sub-category', 'ProductController@retriveSubCategory');

       Route::post('retrive-grocery-sub-category', 'ProductController@retriveGrocerySubCategory');

      Route::post('retrive-grocery-size','ProductController@retriveGrocerySize');

        
        Route::post('retrive-third-level-sub-category', 'ProductController@retriveThirdLevelSubCategory');
        
        Route::post('retrive-size-color', 'ProductController@retriveSizeColor');
    });

    Route::group(['namespace'=>'Users'],function(){

        /** Users List **/
        Route::get('users-list', 'UsersController@usersList')->name('admin.users_list');

        /** Ajax User Datatable **/
        Route::post('users-list-data', 'UsersController@usersListData')->name('admin.users_list_data');

        /** User Profile **/
        Route::get('users-profile/{user_id}', 'UsersController@usersProfile')->name('admin.users_profile');
    });

    Route::group(['namespace'=>'Orders'],function(){

        /** New Orders List **/
        Route::get('new-orders-list', 'OrdersController@newOrdersList')->name('admin.new_orders_list');

        /** Out for Delivery Orders List **/
        Route::get('out-for-delivery-orders-list', 'OrdersController@outForDeliveryOrdersList')->name('admin.out_for_delivery_orders_list');

        /** Delivered Orders List **/
        Route::get('delivered-orders-list', 'OrdersController@deliveredOrdersList')->name('admin.delivered_orders_list');

        /** Delivered Orders List **/
        Route::get('canceled-orders-list', 'OrdersController@canceledOrdersList')->name('admin.canceled_orders_list');

        /** User Order History List **/
        Route::get('users-orders-history-list/{user_id}', 'OrdersController@usersOrdersHistoryList')->name('admin.users_orders_history_list');

        /** Ajax Order Datatable **/
        Route::post('orders-list-data', 'OrdersController@ordersListData')->name('admin.orders_list_data');
        Route::post('orders-history-list-data', 'OrdersController@ordersHistoryListData')->name('admin.orders_history_list_data');

        /** View Order Details **/
        Route::get('order-detail/{order_id}', 'OrdersController@orderDetail')->name('admin.order_detail');

        /** Invoice **/
        Route::get('invoice/{order_id}', 'OrdersController@invoice')->name('admin.invoice');

        /** Order Status Update **/
        Route::get('order-status-update/{order_id}/{status}', 'OrdersController@orderStatusUpdate')->name('admin.order_status_update');
    });

    Route::group(['namespace'=>'Review'],function(){

        /** New Reviews List **/
        Route::get('new-reviews-list', 'ReviewController@newReviewList')->name('admin.new_reviews_list');

        /** Verified Reviews List **/
        Route::get('verified-reviews-list', 'ReviewController@verifiedReviewList')->name('admin.verified_reviews_list');

        /** Ajax Order Datatable **/
        Route::post('reviews-list-data', 'ReviewController@reviewsListData')->name('admin.reviews_list_data');
        // Route::post('orders-history-list-data', 'OrdersController@ordersHistoryListData')->name('admin.orders_history_list_data');

        /** Verified Review **/
        Route::get('verified-review/{user_id}/{product_id}', 'ReviewController@verifiedReview')->name('admin.verified_review');

        /** Delete Review **/
        Route::get('delete-review/{user_id}/{product_id}', 'ReviewController@deleteReview')->name('admin.delete_review');

        /** Invoice **/
        // Route::get('invoice/{order_id}', 'OrdersController@invoice')->name('admin.invoice');

        /** Order Status Update **/
        // Route::get('order-status-update/{order_id}/{status}', 'OrdersController@orderStatusUpdate')->name('admin.order_status_update');
    });
});
