<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
    	try {
            $stock_id = decrypt($request->input('stock_id'));
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
        {
            $check_cart_product = DB::table('cart')
                ->where('user_id', Auth::guard('users')->user()->id)
                ->where('stock_id', $stock_id)
                ->count();

                if ($check_cart_product < 1 ) {
                    DB::table('cart')
                        ->insert([
                            'user_id' => Auth::guard('users')->user()->id,
                            'stock_id' =>  $stock_id,
                            'quantity' => (int)$request->input('quantity'),
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                }
        }
        else
        {
            if (empty(Session::get('cart')))
                $cart = array();
            else
                $cart = Session::get('cart');

            if ($request->input('quantity') > 0)
                $cart[$stock_id] = $request->input('quantity');

            Session::put('cart', $cart);
            Session::save();
        }

        return redirect()->route('web.view_cart');
    }

    public function viewCart()
    {
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

        return view('web.cart.view_cart', compact('cart_data'));
    }

    public function removeCartItem($stock_id)
    {
        try {
            $stock_id = decrypt($stock_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
        {
            DB::table('cart')
                ->where('user_id', Auth::guard('users')->user()->id)
                ->where('stock_id', $stock_id)
                ->delete();
        }
        else
        {
            if(Session::has('cart') && !empty(Session::get('cart'))){
                Session::forget('cart.'.$stock_id);
            }
        }

        return redirect()->route('web.view_cart');
    }

    public function updateCart(Request $request)
    {
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
        {
            if (count($request->input('stock_id')) > 0) {
                for($i = 0; $i < count($request->input('stock_id')); $i++) {
                    $check_cart_product = DB::table('cart')
                        ->where('user_id', Auth::guard('users')->user()->id)
                        ->where('stock_id', $request->input('stock_id')[$i])
                        ->count();

                    if ($check_cart_product > 0) {
                        DB::table('cart')
                            ->where('user_id', Auth::guard('users')->user()->id)
                            ->where('stock_id', $request->input('stock_id')[$i])
                            ->update([
                                'quantity' => (int)$request->input('quantity')[$i],
                                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            ]);
                    }
                }
            }
        }
        else
        {
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');

                if (count($cart) > 0) {
                    $i = 0;
                    foreach ($cart as $stock_id => $item) {

                        if($request->input('quantity')[$i] > 0)
                            $cart[$stock_id] = $request->input('quantity')[$i];

                        $i++;
                    }
                }

                Session::put('cart', $cart);
                Session::save();
            }
        }

        return redirect()->route('web.view_cart');
    }
}
