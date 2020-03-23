<?php

//========= index =========//

Route::get('/', function () {
    return view('web.index');
})->name('web.index');

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