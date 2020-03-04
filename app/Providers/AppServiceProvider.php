<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;
use Session;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('web.template.partials.header', function ($view) {

            $men_sub_categories = DB::table('sub_category')
                ->where('top_category_id', 1)
                ->orderBy('id', 'ASC')
                ->get();

            $women_sub_categories = DB::table('sub_category')
                ->where('top_category_id', 2)
                ->orderBy('id', 'ASC')
                ->get();

            /** Cart Items **/
            $cart_data = [];
            if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
            {
                $user_id = Auth::guard('users')->user()->id;
                $cart = DB::table('cart')->where('user_id', $user_id)->get();
                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {

                        $stock = DB::table('product_stock')
                                ->where('id', $cart[$i]->stock_id)
                                ->first();

                        $product = DB::table('product')
                            ->where('id', $stock->product_id)
                            ->first();

                        $cart_data[] = [
                            'stock_id' => $cart[$i]->stock_id,
                            'product_id' => $stock->product_id,
                            'product_name' => $product->product_name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                            'quantity' => $cart[$i]->quantity
                        ];
                    }
                }
            } 
            else 
            {
                if (Session::has('cart') && !empty(Session::get('cart'))) {
                    $cart = Session::get('cart');

                    if (count($cart) > 0) {
                        foreach ($cart as $stock_id => $item) {

                            $stock = DB::table('product_stock')
                                ->where('id', $stock_id)
                                ->first();

                            $product = DB::table('product')
                                ->where('id', $stock->product_id)
                                ->first();

                            $cart_data[] = [
                                'stock_id' => $stock->id,
                                'product_id' => $stock->product_id,
                                'product_name' => $product->product_name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                                'quantity' => $item
                            ];
                        }
                    }
                }
            }

            $data = [
                'men_sub_categories' => $men_sub_categories,
                'women_sub_categories' => $women_sub_categories,
                'cart_data' => $cart_data
            ];
           
            $view->with('header_data', $data);
        });

        View::composer('admin.template.partials.header', function ($view) {

            $new_order_cnt = DB::table('order')
                ->where('order_status', 1)
                ->count();

            $data = [
                'new_order_cnt' => $new_order_cnt,
            ];
           
            $view->with('header_data', $data);
        });
    }
}
