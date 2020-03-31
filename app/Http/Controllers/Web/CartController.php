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
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id))
        {
            $check_cart_product = DB::table('cart')
                ->where('user_id', Auth::guard('users')->user()->id)
                ->where('product_id', $request->input('product_id'))
                ->count();

            if ($check_cart_product < 1 ) {

                /** Checking Product Size **/
                if ($request->has('product_size_id')) {
                    
                    $stock = DB::table('product_stock')
                        ->where('id', $request->input('product_size_id'))
                        ->first();

                    if ($stock->stock >= $request->input('qty')) 
                        $size_id = $request->input('product_size_id');
                    else
                        return redirect()->back()->with('msg', 'Required quantity not available');
                } else {

                    $stock = DB::table('product')
                        ->where('id', $request->input('product_id'))
                        ->first();

                    if ($stock->stock >= $request->input('qty')) 
                        $size_id = 0;
                    else
                        return redirect()->back()->with('msg', 'Required quantity not available');    
                }

                /** Checking Product Color **/
                if ($request->has('product_color_id')) 
                    $color_id = $request->input('product_color_id');
                else
                    $color_id = 0;

                DB::table('cart')
                    ->insert([
                        'user_id' => Auth::guard('users')->user()->id,
                        'product_id' =>  $request->input('product_id'),
                        'size_id' =>  $size_id,
                        'color_id' =>  $color_id,
                        'quantity' => (int)$request->input('quantity'),
                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
            } else {

                $cart_product = DB::table('cart')
                    ->where('user_id', Auth::guard('users')->user()->id)
                    ->where('product_id', $request->input('product_id'))
                    ->first();

                /** Checking Product Size **/
                if ($request->has('product_size_id')) {
                    
                    $stock = DB::table('product_stock')
                        ->where('id', $request->input('product_size_id'))
                        ->first();

                    if ($stock->stock >= ($request->input('qty') + $cart_product->quantity)) 
                        $size_id = $request->input('product_size_id');
                    else
                        return redirect()->back()->with('msg', 'Required quantity not available');
                } else {

                    $stock = DB::table('product')
                        ->where('id', $request->input('product_id'))
                        ->first();

                    if ($stock->stock >= ($request->input('qty') + $cart_product->quantity)) 
                        $size_id = 0;
                    else
                        return redirect()->back()->with('msg', 'Required quantity not available');    
                }

                /** Checking Product Color **/
                if ($request->has('product_color_id')) 
                    $color_id = $request->input('product_color_id');
                else
                    $color_id = 0;

                DB::table('cart')
                    ->where('user_id', Auth::guard('users')->user()->id)
                    ->where('product_id', $request->input('product_id'))
                    ->increment('quantity', (int)$request->input('qty'));

                DB::table('cart')
                    ->where('user_id', Auth::guard('users')->user()->id)
                    ->where('product_id', $request->input('product_id'))
                    ->update([
                        'size_id' => $size_id,
                        'color_id' => $color_id
                    ]);
            }
        }
        else
        {
            /** Checking Product Size **/
            if ($request->has('product_size_id')) {
                
                $stock = DB::table('product_stock')
                    ->where('id', $request->input('product_size_id'))
                    ->first();

                if ($stock->stock >= $request->input('qty')) 
                    $size_id = $request->input('product_size_id');
                else
                    return redirect()->back()->with('msg', 'Required quantity not available');
            } else {

                $stock = DB::table('product')
                    ->where('id', $request->input('product_id'))
                    ->first();

                if ($stock->stock >= $request->input('qty')) 
                    $size_id = 0;
                else
                    return redirect()->back()->with('msg', 'Required quantity not available');    
            }

            /** Checking Product Color **/
            if ($request->has('product_color_id')) 
                $color_id = $request->input('product_color_id');
            else
                $color_id = 0;

            if (empty(Session::get('cart')))
                $cart = array();
            else
                $cart = Session::get('cart');

            if(isset($cart[$request->input('product_id')])){

                $product = explode(',', $cart[$request->input('product_id')]);
                $quantity = $product[0];
                $size_id1 = $product[1];
                $color_id1 = $product[2];

                if ($size_id1 = $size_id) {
                    
                    if ($stock->stock >= ($quantity + $request->input('qty'))) {
                        $cart[$request->input('product_id')] = ($quantity + $request->input('qty')).",".$size_id1.",".$color_id1;
                    } else {
                        return redirect()->back()->with('msg', 'Required quantity not available');
                    }
                } else {

                    $cart[$request->input('product_id')] = $request->input('qty').",".$size_id.",".$color_id;
                }
            } else {
                /** Merging Qty, Size, Color **/
                $cart[$request->input('product_id')] = $request->input('qty').",".$size_id.",".$color_id;
            }

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

                $cart = DB::table('cart')
                    ->where('user_id', $user_id)
                    ->get();

                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {
                                
                        $product_cnt = DB::table('product')
                            ->where('product.id', $cart[$i]->product_id)
                            ->where('product.status', 2)
                            ->count();

                        if($product_cnt > 0) {
                            DB::table('cart')
                                ->where('user_id', $user_id)
                                ->where('cart.product_id', $cart[$i]->product_id)
                                ->delete();
                        }
                    }
                }

                $cart = DB::table('cart')
                    ->where('user_id', $user_id)
                    ->get();

                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {

                        if(($cart[$i]->size_id != 0) && ($cart[$i]->color_id == 0)) {
                                    
                            $product = DB::table('product')
                                ->leftJoin('product_stock', 'product.id', '=', 'product_stock.product_id')
                                ->where('product.id', $cart[$i]->product_id)
                                ->where('product_stock.id', $cart[$i]->size_id)
                                ->select('product.*', 'product_stock.size')
                                ->distinct()
                                ->first();
                        }

                        if(($cart[$i]->size_id == 0) && ($cart[$i]->color_id != 0)) {
                                    
                            $product = DB::table('product')
                                ->leftJoin('product_color_mapping', 'product.id', '=', 'product_color_mapping.product_id')
                                ->where('product.id', $cart[$i]->product_id)
                                ->where('product_color_mapping.id', $cart[$i]->color_id)
                                ->select('product.*', 'product_color_mapping.color', 'product_color_mapping.color_code')
                                ->distinct()
                                ->first();
                        }

                        if(($cart[$i]->size_id != 0) && ($cart[$i]->color_id != 0)) {
                                    
                            $product = DB::table('product')
                                ->leftJoin('product_stock', 'product.id', '=', 'product_stock.product_id')
                                ->leftJoin('product_color_mapping', 'product.id', '=', 'product_color_mapping.product_id')
                                ->where('product.id', $cart[$i]->product_id)
                                ->where('product_stock.id', $cart[$i]->size_id)
                                ->where('product_color_mapping.id', $cart[$i]->color_id)
                                ->select('product.*', 'product_color_mapping.color', 'product_color_mapping.color_code', 'product_stock.size')
                                ->distinct()
                                ->first();
                        }

                        if(($cart[$i]->size_id == 0) && ($cart[$i]->color_id == 0)) {
                                
                            $product = DB::table('product')
                                ->where('product.id', $cart[$i]->product_id)
                                ->select('product.*')
                                ->distinct()
                                ->first();
                        }

                        if (isset($product->size))
                            $size = $product->size;
                        else
                            $size = "";

                        if (isset($product->color_code))
                            $color_code = $product->color_code;
                        else
                            $color_code = "";

                        $cart_data[] = [
                            'product_id' => $product->id,
                            'slug' => $product->slug,
                            'banner' => $product->banner,
                            'product_name' => $product->product_name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                            'quantity' => $cart[$i]->quantity,
                            'size' => $size,
                            'color_code' => $color_code
                        ];
                            
                    }
                }
        } 
        else 
        {
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');
                // dd($cart);
                if (count($cart) > 0) {
                    foreach ($cart as $product_id => $item) {
                                
                        if (!empty($product_id)) {
                            $product_cnt = DB::table('product')
                                ->where('product.id', $product_id)
                                ->where('product.status', 2)
                                ->count();

                                // dd($product_cnt);

                            if($product_cnt > 0){
                                Session::forget('cart.'.$product_id);
                            }
                        }
                    }
                }


                $cart = Session::get('cart');
                if (count($cart) > 0) {
                    foreach ($cart as $product_id => $item) {

                        if (!empty($product_id)) {

                            $product = explode(',', $item);
                            $quantity = $product[0];
                            $size_id1 = $product[1];
                            $color_id1 = $product[2];

                            if(($size_id1 != 0) && ($color_id1 == 0)) {
                                
                                $product = DB::table('product')
                                    ->leftJoin('product_stock', 'product.id', '=', 'product_stock.product_id')
                                    ->where('product.id', $product_id)
                                    ->where('product_stock.id', $size_id1)
                                    ->select('product.*', 'product_stock.size')
                                    ->distinct()
                                    ->first();
                            }

                            if(($size_id1 == 0) && ($color_id1 != 0)) {
                                
                                $product = DB::table('product')
                                    ->leftJoin('product_color_mapping', 'product.id', '=', 'product_color_mapping.product_id')
                                    ->where('product.id', $product_id)
                                    ->where('product_color_mapping.id', $color_id1)
                                    ->select('product.*', 'product_color_mapping.color', 'product_color_mapping.color_code')
                                    ->distinct()
                                    ->first();
                            }

                            if(($size_id1 != 0) && ($color_id1 != 0)) {
                                
                                $product = DB::table('product')
                                    ->leftJoin('product_stock', 'product.id', '=', 'product_stock.product_id')
                                    ->leftJoin('product_color_mapping', 'product.id', '=', 'product_color_mapping.product_id')
                                    ->where('product.id', $product_id)
                                    ->where('product_stock.id', $size_id1)
                                    ->where('product_color_mapping.id', $color_id1)
                                    ->select('product.*', 'product_color_mapping.color', 'product_color_mapping.color_code', 'product_stock.size')
                                    ->distinct()
                                    ->first();
                            }

                            if(($size_id1 == 0) && ($color_id1 == 0)) {
                                
                                $product = DB::table('product')
                                    ->where('product.id', $product_id)
                                    ->select('product.*')
                                    ->distinct()
                                    ->first();
                            }

                            if (isset($product->size))
                                $size = $product->size;
                            else
                                $size = "";

                            if (isset($product->color_code))
                                $color_code = $product->color_code;
                            else
                                $color_code = "";

                            $cart_data[] = [
                                'product_id' => $product->id,
                                'slug' => $product->slug,
                                'banner' => $product->banner,
                                'product_name' => $product->product_name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                                'quantity' => $quantity,
                                'size' => $size,
                                'color_code' => $color_code
                            ];
                        }
                    }
                }

                // dd($cart_data);
            }
        }

        return view('web.cart.view_cart', compact('cart_data'));
    }

    public function removeCartItem($product_id)
    {
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
        {
            DB::table('cart')
                ->where('user_id', Auth::guard('users')->user()->id)
                ->where('product_id', $product_id)
                ->delete();
        }
        else
        {
            if(Session::has('cart') && !empty(Session::get('cart'))){
                Session::forget('cart.'.$product_id);
            }
        }

        return redirect()->route('web.view_cart');
    }

    public function updateCart(Request $request)
    {
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) 
        {
            $check_cart_product = DB::table('cart')
                ->where('user_id', Auth::guard('users')->user()->id)
                ->where('product_id', $request->input('product_id'))
                ->count();

            if ($check_cart_product > 0) {

                $cart_product = DB::table('cart')
                    ->where('user_id', Auth::guard('users')->user()->id)
                    ->where('product_id', $request->input('product_id'))
                    ->first();

                /** Checking Product Size **/
                if ($request->has('product_size_id')) {
                    
                    $stock = DB::table('product_stock')
                        ->where('id', $request->input('product_size_id'))
                        ->first();

                    if ($stock->stock >= ($request->input('qty') + $cart_product->quantity)) 
                        $size_id = $request->input('product_size_id');
                    else
                        return redirect()->back()->with('msg'.$request->input('product_id'), 'Required quantity not available');
                } else {

                    $stock = DB::table('product')
                        ->where('id', $request->input('product_id'))
                        ->first();

                    if ($stock->stock >= ($request->input('qty') + $cart_product->quantity)) 
                        $size_id = 0;
                    else
                        return redirect()->back()->with('msg'.$request->input('product_id'), 'Required quantity not available');    
                }

                DB::table('cart')
                    ->where('user_id', Auth::guard('users')->user()->id)
                    ->where('product_id', $request->input('product_id'))
                    ->update(['quantity' => (int)$request->input('qty')]);
            }
        }
        else
        {
            // dd($request);
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');
                if (count($cart) > 0) {

                    $product = explode(',', $cart[$request->input('product_id')]);
                    $quantity = $product[0];
                    $size_id1 = $product[1];
                    $color_id1 = $product[2];

                    /** Checking Product Size **/
                    if ($size_id1 != 0) {
                        
                        $stock = DB::table('product_stock')
                            ->where('id', $size_id1)
                            ->first();

                        if ($stock->stock >= $request->input('qty')) 
                            $cart[$request->input('product_id')] = $request->input('qty').",".$size_id1.",".$color_id1;
                        else
                            return redirect()->back()->with('msg'.$request->input('product_id'), 'Required quantity not available');
                    } else {

                        $stock = DB::table('product')
                            ->where('id', $request->input('product_id'))
                            ->first();

                        if ($stock->stock >= $request->input('qty')) 
                            $cart[$request->input('product_id')] = $request->input('qty').",".$size_id1.",".$color_id1;
                        else
                            return redirect()->back()->with('msg'.$request->input('product_id'), 'Required quantity not available');    
                    }
                }

                Session::put('cart', $cart);
                Session::save();
            }
        }

        return redirect()->route('web.view_cart');
    }
}
